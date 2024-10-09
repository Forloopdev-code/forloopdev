<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
</script>

<template>
    <div>
        <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent dark:border-gray-700 text-center">
            
            <h1 class="mt-8 text-2xl font-medium text-gray-900 dark:text-white">
                Welcome to Forloop: Your Solution to Streamlined Processes
            </h1>

            <div class='w-1/2 bg-yellow-500'>
                <p class="mt-6 text-gray-500 dark:text-gray-400 leading-relaxed">
                    At Forloop, we specialize in creating innovative software that 
                    improves processes and solves complex problems. Whether you're 
                    looking to optimize operations or enhance your business efficiency,
                    our custom solutions are tailored to meet your unique needs.
                </p>    
            </div>
        </div>

        

        <div class="bg-gray-200 dark:bg-gray-800 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">
            <div>
                <div class="w-full text-center mb-2.5">
                    <h2 class="ms-3 text-xl font-semibold text-gray-900 dark:text-white">
                        Our Expertise
                    </h2>
                </div>
                    
                <h3 class="ms-3 text-lg font-semibold text-gray-900 text-center dark:text-white">
                    Process Improvement &amp; Problem-Solving Software
                </h3>

                <div class="mt-4">
                <ol class="list-disc">
                    <li>
                    We help businesses operate smarter by developing software that automates tasks, 
                    improves workflow, and solves bottlenecks. No matter the challenge, 
                    we’re here to simplify and enhance your processes.
                    </li>
                    <li>
                    WordPress &amp; Web Development
                    We create dynamic and responsive websites that not only look great but also perform seamlessly.
                    From custom WordPress solutions to full-stack web development,
                    we ensure your online presence is robust and scalable.
                    </li>
                    <li>
                    Drone Videography
                    Take your business to new heights with our professional drone videography services. Perfect for real estate, marketing, and events, our team captures stunning aerial footage that tells your story from a whole new perspective.
                    </li>
                </ol>
                </div>
            </div>
            <div>
                <img src="img/laptopImage.jpg" alt="">
            </div>
        </div>

        <div class="bg-gray-200 dark:bg-gray-800 bg-opacity-25 lg:p-8 bg-trueBlue">
            <h1 class="text-2xl font-medium text-gray-900 dark:text-white">
                Why Choose Forloop?
            </h1>

             <div clas='w-9/12 h-auto bg-white-500'>
                <p class="mt-6 text-gray-500 dark:text-gray-400 leading-relaxed">
                    </p>
                    
                    We combine technical expertise with a deep understanding of business processes,
                    ensuring our solutions are effective, scalable, and tailored to your needs.
                    Discover how we can help you streamline operations, enhance your digital presence,
                    and capture stunning aerial footage.
                <ol class="list-disc">
                    <li>
                    <h3 class="ms-3 text-m font-semibold text-gray-900 dark:text-white">Process Improvement &amp; Software Solutions</h3>
                    <p class="ms-3">Tailored software to enhance workflows and solve business challenges.</p>
                    </li>
                    <li>
                    <h3 class="ms-3 text-m font-semibold text-gray-900 dark:text-white">Web Development &amp; WordPress</h3>
                    <p class="ms-3">Dynamic and responsive websites built to elevate your brand.</p>
                    </li>
                    <li>
                    <h3 class="ms-3 text-m font-semibold text-gray-900 dark:text-white">Drone Videography</h3>
                    <p class="ms-3">Breathtaking aerial shots that give you a new perspective on your business.</p>
                    </li>
                </ol>
            </div>
        </div>

         <div class="flex justify-around my-20">

                <img class="block h-20 w-auto" src="img/laravel-2.svg" alt="">
                <img class="block h-20 w-auto" src="img/python-5.svg" alt="">
                <img class="block h-20 w-auto" src="img/vue-9.svg" alt="">
                <img class="block h-20 w-auto" src="img/wordpress-icon.svg" alt="">


        </div>

        <div class="bg-gray-200 dark:bg-gray-800 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8  border-b border-gray-200 dark:border-gray-700">
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
                    Laravel has wonderful documentation covering every aspect of the framework. Whether you're new to the framework or have previous experience, we recommend reading all of the documentation from beginning to end.
                </p>

                <p class="mt-4 text-sm">
                    <a href="https://laravel.com/docs" class="inline-flex items-center font-semibold text-indigo-700 dark:text-indigo-300">
                        Explore the documentation

                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="ms-1 w-5 h-5 fill-indigo-500 dark:fill-indigo-200">
                            <path fill-rule="evenodd" d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </p>
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
                    Laracasts offers thousands of video tutorials on Laravel, PHP, and JavaScript development. Check them out, see for yourself, and massively level up your development skills in the process.
                </p>

                <p class="mt-4 text-sm">
                    <a href="https://laracasts.com" class="inline-flex items-center font-semibold text-indigo-700 dark:text-indigo-300">
                        Start watching Laracasts

                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="ms-1 w-5 h-5 fill-indigo-500 dark:fill-indigo-200">
                            <path fill-rule="evenodd" d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </p>
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
                    Laravel Jetstream is built with Tailwind, an amazing utility first CSS framework that doesn't get in your way. You'll be amazed how easily you can build and maintain fresh, modern designs with this wonderful framework at your fingertips.
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
                    Authentication and registration views are included with Laravel Jetstream, as well as support for user email verification and resetting forgotten passwords. So, you're free to get started with what matters most: building your application.
                </p>
            </div>
        </div>
    </div>
</template>
