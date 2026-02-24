<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>

<template>
    <Head title="Welcome" />

    <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        <!-- Site navigation bar -->
        <div class="sm:fixed sm:top-0 sm:start-0 sm:end-0 z-10 bg-jet bg-opacity-90 backdrop-blur-sm px-6 py-3 flex items-center justify-between">
            <img class="h-8 w-auto" src="img/logo_name_light.png" alt="Forloop" />
            <div class="flex items-center gap-6 text-sm font-medium text-platinum">
                <Link href="/blog" class="hover:text-pistachio transition-colors">Blog</Link>
                <template v-if="canLogin">
                    <Link v-if="$page.props.auth.user" href="/admin/posts" class="hover:text-pistachio transition-colors">Admin</Link>
                    <Link v-else :href="route('login')" class="hover:text-pistachio transition-colors">Log in</Link>
                </template>
            </div>
        </div>

        
        <div class="mx-auto pt-12 sm:pt-14">
            <div class="flex
            justify-around
            content-center
            bg-platinum
            h-2/6
            bg-[url('/img/Hero1.jpg')] logo_green_transparent.png
            bg-fixed
            bg-auto
            bg-no-repeat
            bg-center
            lg:bg-left">
            <div class="bg-jet bg-opacity-65 w-full lg:flex text-center md-text-left justify-around px-10 pt-10">
                <div class="lg:w-1/4 lg:mt-20 lg:mb-10 lg:ml-20 mx-auto">
                    <img class="block h-52 w-auto" src="img/logo_name_light.png" alt="">
                </div>
                <div class='text-platinum md:text-center lg:w-3/4'>
                    <h1 class="mt-8 text-4xl lg:text-8xl font-medium text-platinum dark:text-white">Welcome to Forloop</h1>
                    <h1 class="mt-8 text-4xl lg:text-5xl font-medium dark:text-white">
                        Your Solution to Streamlined Processes
                    </h1>
                    <div class="mt-6 mb-10">
                        <p class="text-white text-lg lg:text-2xl dark:text-gray-400 leading-relaxed">
                            At Forloop, we specialize in creating innovative software that 
                            improves processes and solves complex problems. Whether you're 
                            looking to optimize operations or enhance your business efficiency,
                            our custom solutions are tailored to meet your unique needs.
                        </p>    
                    </div>
                </div>
                </div>
            </div>

            <div class="text-jet">
                <div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8 mx-auto w-full">
                        <div class="p-10">
                            <div class="w-full text-center mb-2.5 lg:mt-48">
                                <h2 class="ms-3 text-5xl lg:text-9xl font-semibold text-gray-900 dark:text-white">
                                    Our Expertise
                                </h2>
                            </div>
                                
                            <h3 class="ms-3 text-xl lg:text-2xl font-semibold text-gray-900 text-center dark:text-white my-10">
                                Process Improvement &amp; Problem-Solving Software
                            </h3>

                            <div class="mt-4 text-xl lg:text-2xl">
                                <ol class="list-disc">
                                    <li>
                                        We develop software to automate tasks, streamline workflows, and solve bottlenecks, simplifying your processes.
                                    </li>
                                    <li>
                                        WordPress &amp; Web Development: We build responsive, dynamic websites, from custom WordPress to full-stack solutions, ensuring performance and scalability.
                                    </li>
                                    <li>
                                        Drone Videography: Capture stunning aerial footage for real estate, marketing, and events with our professional drone services.
                                    </li>
                                </ol>
                            </div>
                        </div>
                        <div class="lg:py-20 lg:px-10">
                            <div class="lg:w-10/12 mx-auto">
                                <img class="rounded-xl shadow-2xl" src="img/laptopImage.jpg" alt="">
                            </div>
                            <div class="lg:w-10/12 mx-auto bg-opacity-75 shadow-xl px-8 py-8 lg:py-20 bg-persianGreen border border-pistachio rounded-xl my-20 lg:my-40 bg-[url('/img/logo_green_transparent.png')] ">
                                <h1 class="text-4xl font-medium text-gray-900 dark:text-white">
                                    Why Choose Forloop?
                                </h1>

                                <div clas='w-2/4'>
                                    <p class="mt-6 text-xl leading-relaxed">
                                        We combine technical expertise with a deep understanding of business processes,
                                        ensuring our solutions are effective, scalable, and tailored to your needs.
                                        Discover how we can help you streamline operations, enhance your digital presence,
                                        and capture stunning aerial footage.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="lg:flex mx-auto justify-around">
                        <div class="bg-platinum border border-jet shadow-xl rounded-xl py-8 px-3 mx-10 my-10 lg:mx-1 lg:w-1/4 bg-opacity-75">
                            <div class="w-1/4 mx-auto mb-10">
                                <img class="h-20" src="img/processIcon.svg" alt="">    
                            </div>
                            <h2 class="ms-3 text-4xl font-semibold text-gray-900 dark:text-white">Software Development</h2>
                            <h3 class="ms-3 text-xl font-semibold text-gray-900 dark:text-white">Process Improvement &amp; Problem Solving Software</h3>
                            <p class="ms-3 text-lg">
                                At Forloop, we design custom software to improve workflows, eliminate inefficiencies,
                                and solve your toughest business challenges. Whether you’re looking for automation,
                                data management, or a full-scale process overhaul, our team creates solutions that fit your needs perfectly.
                            </p>
                            <p class="ms-3 text-lg font-semibold my-2">
                                Our Expertise Includes:
                            </p>
                            <ul class="list-disc ml-4">
                                <li class="ms-3 text-lg ">Custom Software Development: Tailored to address specific business needs.</li>
                                <li class="ms-3 text-lg ">Process Automation: Streamlining repetitive tasks for efficiency.</li>
                                <li class="ms-3 text-lg ">Business Intelligence Tools: Harness data to drive smarter decision-making.</li>
                            </ul>
                            <p class="ms-3 text-lg my-2">Let us develop a solution that’s not only innovative but also integrates seamlessly with your operations.</p>
                        </div>
                        <div class="bg-platinum border border-jet shadow-xl rounded-xl py-8 px-3 mx-10 my-10 lg:mx-1 lg:w-1/4 bg-opacity-75">
                            <div class="w-1/4 mx-auto mb-10">
                                <img class="h-20" src="img/webDevIcon.svg" alt="">    
                            </div>
                            <h2 class="ms-3 text-4xl font-semibold text-gray-900 dark:text-white">Web Development &amp; WordPress</h2>
                            <h3 class="ms-3 text-xl font-semibold text-gray-900 dark:text-white">Building Digital Experiences That Drive Results</h3>
                            <p class="ms-3 text-lg">
                                From a beautifully designed WordPress site to full-stack web development,
                                Forloop brings your vision to life online. We specialize in creating responsive,
                                user-friendly websites that offer a seamless experience for visitors,
                                whether you're looking to revamp an existing site or launch a new one.
                            </p>
                            <p class="ms-3 text-lg font-semibold my-2">
                                Our Web Development Services Include:
                            </p>
                            <ul class="list-disc ml-4">
                                <li class="ms-3 text-lg ">Custom WordPress Solutions: Fully customizable, SEO-optimized, and mobile-ready.</li>
                                <li class="ms-3 text-lg ">Full-Stack Web Development: Scalable and robust web apps tailored to your needs.</li>
                                <li class="ms-3 text-lg ">UX/UI Design: Crafting intuitive and engaging user experiences.</li>
                            </ul>
                            <p class="ms-3 text-lg my-2">Your website is often the first impression customers have of your business. Let’s make it count.</p>
                        </div>
                        <div class="bg-platinum border border-jet shadow-xl rounded-xl py-8 px-3 mx-10 my-10 lg:mx-1 lg:w-1/4 bg-opacity-75">
                            <div class="w-1/4 mx-auto mb-10">
                                <img class="h-20" src="img/droneIcon.svg" alt="">    
                            </div>
                            <h2 class="ms-3 text-4xl font-semibold text-gray-900 dark:text-white">Drone Videography</h2>
                            <h3 class="ms-3 text-xl font-semibold text-gray-900 dark:text-white">Capture Stunning Aerial Perspectives with Forloop</h3>
                            <p class="ms-3 text-lg">
                                Our drone videography services offer a unique way to showcase your business,
                                property, or event. With professional-grade equipment and experienced pilots,
                                we deliver high-quality aerial footage that provides a new viewpoint on the world below.
                            </p>
                            <p class="ms-3 text-lg font-semibold my-2">
                                Perfect for:
                            </p>
                            <ul class="list-disc ml-4">
                                <li class="ms-3 text-lg ">Real Estate Marketing</li>
                                <li class="ms-3 text-lg ">Event Coverage</li>
                                <li class="ms-3 text-lg ">Construction and Project Monitoring</li>
                                <li class="ms-3 text-lg ">Tourism and Hospitality Promotion</li>
                            </ul>
                            <p class="ms-3 text-lg my-2">We ensure each project is tailored to meet your objectives, providing breathtaking visuals that elevate your brand or project.</p>
                        </div>
                    </div>
                </div>

                <div class="flex justify-around my-44">
                    <img class="block h-20 lg:h-40 w-auto" src="img/laravel-2.svg" alt="">
                    <img class="block h-20 lg:h-40 w-auto" src="img/python-5.svg" alt="">
                    <img class="block h-20 lg:h-40 w-auto" src="img/vue-9.svg" alt="">
                    <img class="block h-20 lg:h-40 w-auto" src="img/wordpress-icon.svg" alt="">
                </div>

                <div class="bg-jet text-platinum grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8  border-b border-gray-200 dark:border-gray-700">
                    <div>
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-6 h-6 stroke-gray-400">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                            </svg>
                            <h2 class="ms-3 text-xl font-semibold text-gray-900 dark:text-white">
                                Laravel
                            </h2>
                        </div>

                        <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                            At Forloop, we use Laravel to build powerful, secure, and scalable web applications.
                            Its flexibility allows us to create custom solutions that fit your specific business needs, ensuring robust performance and a seamless user experience.
                        </p>

                        <!-- <p class="mt-4 text-sm">
                            <a href="https://laravel.com/docs" class="inline-flex items-center font-semibold text-indigo-700 dark:text-indigo-300">
                                Explore the documentation
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="ms-1 w-5 h-5 fill-indigo-500 dark:fill-indigo-200">
                                    <path fill-rule="evenodd" d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        </p> -->
                    </div>

                    

                    <div>
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-6 h-6 stroke-gray-400">
                                <path stroke-linecap="round" d="M15.75 10.5l4.72-4.72a.75.75 0 011.28.53v11.38a.75.75 0 01-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25h-9A2.25 2.25 0 002.25 7.5v9a2.25 2.25 0 002.25 2.25z" />
                            </svg>
                            <h2 class="ms-3 text-xl font-semibold text-gray-900 dark:text-white">
                            Python
                            </h2>
                        </div>

                        <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                            For data-driven solutions, automation, and system integration,
                            Python is our go-to. It enables us to craft efficient backend processes that streamline your operations,
                            improve productivity, and enhance overall business functionality.
                        </p>

                        <!-- <p class="mt-4 text-sm">
                            <a href="https://laracasts.com" class="inline-flex items-center font-semibold text-indigo-700 dark:text-indigo-300">
                                Start watching Laracasts

                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="ms-1 w-5 h-5 fill-indigo-500 dark:fill-indigo-200">
                                    <path fill-rule="evenodd" d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        </p> -->
                    </div>

                    <div>
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-6 h-6 stroke-gray-400">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                            </svg>
                            <h2 class="ms-3 text-xl font-semibold text-gray-900 dark:text-white">
                                Vue JS
                            </h2>
                        </div>

                        <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                            With Vue.js, we deliver dynamic and interactive front-end experiences.
                            This modern JavaScript framework helps us build responsive and fast applications, 
                            making sure your users enjoy a smooth and engaging interface.
                        </p>
                    </div>

                    <div>
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-6 h-6 stroke-gray-400">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                            </svg>
                            <h2 class="ms-3 text-xl font-semibold text-gray-900 dark:text-white">
                                Wordpress
                            </h2>
                        </div>

                        <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                            Our expertise in WordPress allows us to create flexible, easy-to-manage websites.
                            Whether you need a custom theme or plugin, we build solutions that put you in control of your
                            content without sacrificing design or performance.
                        </p>
                    </div>
                    <div class="flex justify-center mt-16 px-6 sm:items-center sm:justify-between">
                        <div class="text-center text-sm sm:text-start">
                            &nbsp;
                        </div>

                        <div class="text-center text-sm sm:text-end sm:ms-0">
                            Built by Forloop 2024
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</template>

<style>
.bg-dots-darker {
    background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E");
}
@media (prefers-color-scheme: dark) {
    .dark\:bg-dots-lighter {
        background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E");
    }
}
</style>
