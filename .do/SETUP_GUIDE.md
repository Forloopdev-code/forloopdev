# DigitalOcean + GitHub Setup Guide

This guide will walk you through setting up all the necessary credentials and infrastructure for your CI/CD pipeline.

---

## Step 1: Create DigitalOcean Resources

### 1.1 Create MySQL Databases

**Staging Database:**
1. Go to [DigitalOcean Control Panel](https://cloud.digitalocean.com)
2. Navigate to **Databases** → **Create Database Cluster**
3. Select:
   - **Engine**: MySQL 8
   - **Plan**: Basic (1GB RAM minimum)
   - **Region**: New York 3 (nyc3)
   - **Name**: `forloopdev-mysql-staging`
4. Click **Create Database Cluster**
5. Once created, click **Get Started** → **Restrict Inbound Connections**
6. Add your App Platform app (we'll get the IP later)
7. Note these credentials:
   - **Host**: `your-db-host.db.ondigitalocean.com`
   - **Port**: `25060`
   - **Username**: `doadmin`
   - **Password**: (shown on screen)
   - **Database**: Create a new database called `forloopdev_staging`

**Production Database:**
- Repeat the same steps but name it `forloopdev-mysql-production`
- Create database: `forloopdev_production`

---

### 1.2 Create Redis (Valkey) Clusters

**Staging Redis:**
1. Navigate to **Databases** → **Create Database Cluster**
2. Select:
   - **Engine**: Redis (or Valkey)
   - **Version**: 7
   - **Plan**: Basic (512MB minimum)
   - **Region**: New York 3 (nyc3)
   - **Name**: `forloopdev-redis-staging`
3. Click **Create Database Cluster**
4. Once created, note these credentials:
   - **Host**: `your-redis-host.db.ondigitalocean.com` (use this WITHOUT `tls://` prefix for now)
   - **Port**: `25061`
   - **Password**: (shown on screen)

**Production Redis:**
- Repeat for `forloopdev-redis-production`

---

### 1.3 Create Spaces Buckets

**Staging Bucket:**
1. Navigate to **Spaces** → **Create a Space**
2. Configure:
   - **Region**: New York 3 (nyc3)
   - **Enable CDN**: Yes
   - **Name**: `forloopdev-staging-uploads`
   - **Privacy**: Private (we'll use signed URLs)
3. Click **Create Space**

**Production Bucket:**
- Repeat for `forloopdev-production-uploads`

**Create Spaces Access Keys:**
1. Navigate to **API** → **Spaces Keys**
2. Click **Generate New Key**
3. Name: `Forloop App Platform`
4. Save both:
   - **Access Key**: (looks like `DO00ABCD...`)
   - **Secret Key**: (save this immediately, you can't see it again)

---

### 1.4 Create App Platform Apps

**Staging App:**
1. Navigate to **Apps** → **Create App**
2. Choose **GitHub** as source
3. Select repository: `Forloopdev-code/forloopdev`
4. Select branch: `develop`
5. **DON'T auto-deploy yet** - we'll configure via the YAML file
6. Click **Edit Plan** → Upload `.do/app-staging.yaml`
7. Review and click **Create Resources**
8. Once created, note the **App ID** (in URL: `apps/<APP_ID>/`)

**Production App:**
- Repeat for production using `.do/app-production.yaml`
- Branch: `master`
- Note the production **App ID**

---

### 1.5 Set Up Email (SendGrid)

**Free Tier Setup:**
1. Go to [SendGrid](https://sendgrid.com) and create account
2. Navigate to **Settings** → **API Keys** → **Create API Key**
3. Name: `Forloop Production`
4. Permissions: **Full Access** (or Mail Send only)
5. Save the API key (you'll use this as password)
6. Username: `apikey` (literally the word "apikey")

**Verify Sender:**
1. Navigate to **Settings** → **Sender Authentication**
2. Verify your domain OR single sender email
3. Use verified email as `MAIL_FROM_ADDRESS`

---

## Step 2: Generate Laravel Application Keys

Run these commands locally:

```bash
# Staging key
php artisan key:generate --show
# Copy output (e.g., base64:abc123...)

# Production key
php artisan key:generate --show
# Copy output (different from staging)
```

---

## Step 3: Configure GitHub Secrets

Navigate to your GitHub repository:
**Settings → Secrets and variables → Actions → New repository secret**

### Required Secrets

#### DigitalOcean API
- **Name**: `DO_ACCESS_TOKEN`
- **How to get**: DigitalOcean → API → Generate New Token
- **Value**: Your personal access token

#### App IDs
- **Name**: `DO_APP_ID_STAGING`
- **Value**: The staging app ID from Step 1.4 (just the ID, not full URL)

- **Name**: `DO_APP_ID_PRODUCTION`
- **Value**: The production app ID from Step 1.4

#### Staging Secrets

- **Name**: `STAGING_APP_KEY`
- **Value**: Output from `php artisan key:generate --show` (staging)

- **Name**: `STAGING_DB_HOST`
- **Value**: MySQL host from Step 1.1 (staging)

- **Name**: `STAGING_DB_DATABASE`
- **Value**: `forloopdev_staging`

- **Name**: `STAGING_DB_USERNAME`
- **Value**: `doadmin` (from Step 1.1)

- **Name**: `STAGING_DB_PASSWORD`
- **Value**: MySQL password from Step 1.1 (staging)

- **Name**: `STAGING_REDIS_HOST`
- **Value**: Redis host from Step 1.2 (staging, WITHOUT `tls://`)

- **Name**: `STAGING_REDIS_PASSWORD`
- **Value**: Redis password from Step 1.2 (staging)

- **Name**: `STAGING_SPACES_KEY`
- **Value**: Spaces access key from Step 1.3

- **Name**: `STAGING_SPACES_SECRET`
- **Value**: Spaces secret key from Step 1.3

- **Name**: `STAGING_MAIL_USERNAME`
- **Value**: `apikey`

- **Name**: `STAGING_MAIL_PASSWORD`
- **Value**: SendGrid API key from Step 1.5

#### Production Secrets

Repeat all `STAGING_` secrets with `PRODUCTION_` prefix using production credentials.

---

## Step 4: Set Environment Variables in App Platform

For each app (staging and production):

1. Go to **Apps** → Your App → **Settings** tab
2. Scroll to **Environment Variables**
3. Click **Edit**
4. Add all variables from `.do/app-staging.yaml` (or production)
5. For SECRET values, use the same values you put in GitHub Secrets
6. Click **Save**

**Important**: The `${STAGING_APP_KEY}` syntax in the YAML means "use the env var I'm setting here". Replace with actual values.

---

## Step 5: Create GitHub Branch Structure

```bash
cd /Users/Spencer/forloopdev

# Make sure you're on master
git checkout master
git pull origin master

# Create develop branch
git checkout -b develop
git push -u origin develop
```

---

## Step 6: Set Up Branch Protection

**For `master` branch:**
1. Go to **Settings → Branches → Add branch protection rule**
2. Branch name pattern: `master`
3. Enable:
   - ✅ Require pull request reviews before merging (1 approval)
   - ✅ Require status checks to pass before merging
   - ✅ Require branches to be up to date before merging
4. Add status check: `test` (from GitHub Actions)
5. Save changes

**For `develop` branch:**
- Same but without PR review requirement (can push directly)

---

## Step 7: Set Up GitHub Environments (for Production Approval)

1. Go to **Settings → Environments → New environment**
2. Name: `production`
3. Configure:
   - ✅ Required reviewers: Add yourself or team members
   - Deployment branches: `main` and `master` only
4. Save

---

## Credential Summary Checklist

Use this checklist to make sure you have everything:

### GitHub Secrets (17 total)
- [ ] `DO_ACCESS_TOKEN`
- [ ] `DO_APP_ID_STAGING`
- [ ] `DO_APP_ID_PRODUCTION`
- [ ] `STAGING_APP_KEY`
- [ ] `STAGING_DB_HOST`
- [ ] `STAGING_DB_DATABASE`
- [ ] `STAGING_DB_USERNAME`
- [ ] `STAGING_DB_PASSWORD`
- [ ] `STAGING_REDIS_HOST`
- [ ] `STAGING_REDIS_PASSWORD`
- [ ] `STAGING_SPACES_KEY`
- [ ] `STAGING_SPACES_SECRET`
- [ ] `STAGING_MAIL_USERNAME`
- [ ] `STAGING_MAIL_PASSWORD`
- [ ] `PRODUCTION_APP_KEY`
- [ ] `PRODUCTION_DB_HOST`
- [ ] `PRODUCTION_DB_DATABASE`
- [ ] `PRODUCTION_DB_USERNAME`
- [ ] `PRODUCTION_DB_PASSWORD`
- [ ] `PRODUCTION_REDIS_HOST`
- [ ] `PRODUCTION_REDIS_PASSWORD`
- [ ] `PRODUCTION_SPACES_KEY`
- [ ] `PRODUCTION_SPACES_SECRET`
- [ ] `PRODUCTION_MAIL_USERNAME`
- [ ] `PRODUCTION_MAIL_PASSWORD`

### DigitalOcean Resources
- [ ] MySQL Staging Database created
- [ ] MySQL Production Database created
- [ ] Redis Staging Cluster created
- [ ] Redis Production Cluster created
- [ ] Spaces Staging Bucket created
- [ ] Spaces Production Bucket created
- [ ] App Platform Staging App created
- [ ] App Platform Production App created
- [ ] SendGrid account set up

### GitHub Configuration
- [ ] `develop` branch created
- [ ] Branch protection rules set
- [ ] GitHub Environment `production` created with approvers

---

## What Happens Next?

Once all credentials are set up:

1. **Commit and push** the new workflow files to `develop`:
   ```bash
   git add .
   git commit -m "Add CI/CD pipeline configuration"
   git push origin develop
   ```

2. **GitHub Actions will automatically**:
   - Run tests on the push
   - Deploy to staging if tests pass
   - Make the staging app available at your staging URL

3. **To deploy to production**:
   ```bash
   git checkout master
   git merge develop
   git push origin master
   # Then approve the deployment in GitHub Actions
   ```

---

## Troubleshooting

### "App deployment failed"
- Check DigitalOcean App Platform logs in the console
- Verify all environment variables are set correctly
- Make sure database is accessible (check firewall rules)

### "Tests failing in CI"
- Check GitHub Actions logs
- Verify `.env.testing` exists
- Make sure migrations work with SQLite

### "Database connection failed"
- Verify MySQL host, port, username, password
- Check if App Platform IP is whitelisted in database firewall
- Ensure SSL mode is correct

### "Redis connection failed"
- Verify `REDIS_SCHEME=tls` for managed Redis
- Check Redis host doesn't have `tls://` prefix in env var
- Verify Redis port is `25061` (not `6379`)

### "File uploads not working"
- Check Spaces bucket permissions
- Verify Spaces keys are correct
- Ensure `FILESYSTEM_DISK=s3` in production
- Check bucket name matches exactly

---

## Quick Reference: Where to Find What

| What You Need | Where to Find It |
|---------------|------------------|
| MySQL Host | DigitalOcean → Databases → Your MySQL cluster → Connection Details |
| MySQL Password | DigitalOcean → Databases → Your MySQL cluster → Connection Details (click "Show") |
| Redis Host | DigitalOcean → Databases → Your Redis cluster → Connection Details |
| Spaces Keys | DigitalOcean → API → Spaces Keys |
| App Platform App ID | URL when viewing your app: `apps/<ID>/` |
| DigitalOcean API Token | DigitalOcean → API → Tokens/Keys → Generate New Token |
| SendGrid API Key | SendGrid → Settings → API Keys |

---

## Support

If you get stuck:
- Check DigitalOcean App Platform logs
- Check GitHub Actions workflow logs
- Review [Laravel deployment docs](https://laravel.com/docs/10.x/deployment)
- Review [DigitalOcean App Platform docs](https://docs.digitalocean.com/products/app-platform/)
