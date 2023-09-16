<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import 'remixicon/fonts/remixicon.css'
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12">
            <div className="max-w-full mx-auto sm:px-6 lg:px-8">
                <div className="w-full flex flex-wrap justify-center px-4">
                    <div className="mb-12 p-4 md:w-1/5 bg-white overflow-hidden shadow-sm sm:rounded-lg mx-3">
                        <div className="flex">
                            <div className='bg-blue-500 py-4 px-5  rounded-full inline-flex'>
                                <i className="ri-bookmark-fill text-white text-2xl"></i>
                            </div>
                            <div className='mx-3'>
                                <h5 className='text-gray-400 '>Kategori Blog</h5>
                                <h4 className='font-bold text-2xl'>2</h4>
                            </div>
                        </div>
                    </div>
                    <div className="mb-12 p-4 md:w-1/5 bg-white overflow-hidden shadow-sm sm:rounded-lg mx-3">
                        <div className="flex">
                            <div className='bg-emerald-500 py-4 px-5  rounded-full inline-flex'>
                                <i className="ri-book-line text-white text-2xl"></i>
                            </div>
                            <div className='mx-3'>
                                <h5 className='text-gray-400 '>Blog Upload</h5>
                                <h4 className='font-bold text-2xl'>2</h4>
                            </div>
                        </div>
                    </div>
                    <div className="mb-12 p-4 md:w-1/5 bg-white overflow-hidden shadow-sm sm:rounded-lg mx-3">
                        <div className="flex">
                            <div className='bg-orange-500 py-4 px-5  rounded-full inline-flex'>
                                <i className="ri-file-user-fill text-white text-2xl"></i>
                            </div>
                            <div className='mx-3'>
                                <h5 className='text-gray-400 '>User</h5>
                                <h4 className='font-bold text-2xl'>2</h4>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
