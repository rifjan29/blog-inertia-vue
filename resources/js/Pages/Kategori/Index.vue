<script >
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import { Head } from '@inertiajs/vue3';
    import { Link } from "@inertiajs/vue3";
    import { router } from '@inertiajs/vue3'
    import { Table } from "@protonemedia/inertiajs-tables-laravel-query-builder";

    // defineProps(["kategori"])
    export default {
        components: {
            AuthenticatedLayout,
            Head,
            Link,
            Table,
            router,
        },
        props: ['kategori', 'message'],
        setup(){
            // method deletePost
            const deletePost = (id) => {
                router.delete(`/kategori/${id}`)
            }
            return {
                deletePost
            }

        }
    }

    // destroy
    function destroy (id){

    }

</script>

<template>
    <Head title="Kategori Blog"/>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Kategori</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 flex justify-between">
                        <h4 class="text-gray-900 font-bold">List Kategori Blog</h4>
                        <Link
                            :href="route('kategori.create')"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            Tambah data</Link>
                    </div>
                    <!-- flash message -->
                    <div class="w-full p-4">
                        <div
                             v-if="$page.props.flash.message"
                            class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                            <span class="font-medium">Success alert!</span> {{ $page.props.flash.message }}.
                        </div>

                    </div>
                    <!-- flash message -->
                    <div class="p-3">
                        <Table :resource="kategori">
                            <template #cell(actions)="{ item: kategori }">
                                <a :href="`/kategori/${kategori.id}/edit`" class="bg-yellow-400 px-5 py-[12px] rounded-md text-gray-700 hover:bg-yellow-500 mx-2">
                                    Edit
                                </a>
                                <button @click.prevent="deletePost(kategori.id)" class="bg-red-400 px-5 py-2.5 rounded-md text-white hover:bg-red-500 mx-2">
                                    Delete
                                </button>
                            </template>
                        </Table>

                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
