<template>

    <div class="row mx-3 my-5">

        <!-- set progressbar -->
        <!-- <vue-progress-bar></vue-progress-bar> -->

        <div class="col-md-4 line-right">

           <div class="p-3">

                <h1>{{ isEditMode ? 'Edit Product' : 'Create Product' }}</h1>
                <form @submit.prevent="isEditMode ? update() : store()">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" v-model="product.name" placeholder="name">
                        
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" class="form-control" id="price" v-model="product.price" placeholder="price">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="form-control btn-primary">{{ isEditMode ? 'Update' : 'Insert' }}</button>
                    </div>
                </form>

            </div>

        </div>

        <div class="col-md-8">

            <div class="m-3"> 

                <div class="d-flex justify-content-between align-items-center pb-3 line-bottom">
                    <button @click="create" class="btn btn-success"><i class='bx bx-plus-circle text-white px-1'></i>Create</button>
                    <form @submit.prevent="searchProduct" class="d-flex gap-1">
                        <input type="search" name="search" v-model="search" class="form-control w-32" placeholder="Search here...">
                        <input type="submit" class="btn btn-primary" value="Search">
                        <button type="button" @click="getData()" class="btn btn-warning">Reset</button>
                    </form>
                </div>

                <div>

                    <div v-if="isLoad" class="d-flex justify-content-center align-items-center" style="height:70vh;">
                        <loading-component></loading-component>
                    </div>

                    <div v-else>

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(p,i) in products" :key="i">
                                    <td scope="row">{{ p.name }}</td>
                                    <td>${{ p.price }}</td>
                                    <td>
                                        <button @click="edit(p)" class="btn btn-warning"><i class='bx bxs-edit text-white px-1' ></i>Edit</button>
                                        <button @click="destroy(p)" class="btn btn-danger"><i class='bx bx-trash text-white px-1' ></i>Delete</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="#"><i class='bx bx-chevrons-left'></i></a></li>
                                <li class="page-item"><a class="page-link" href="#"><i class='bx bx-chevron-left' ></i></a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#"><i class='bx bx-chevron-right' ></i></a></li>
                                <li class="page-item"><a class="page-link" href="#"><i class='bx bx-chevrons-right' ></i></a></li>
                            </ul>
                        </nav>

                    </div>

                </div>

            </div>

        </div>

    </div>
    
</template>

<script>
import app from '../app.js'
import axios from 'axios';
import { Form } from 'vform'
import Swal from 'sweetalert2'
import LoadingComponent from './LoadingComponent.vue';
// import VueProgressBar from 'vue-progressbar';

// const options = {
//   color: '#0d6efd',
//   failedColor: '#FF0000',
//   thickness: '5px',
//   transition: {
//     speed: '0.9s',
//     opacity: '1s',
//     termination: 300
//   },
//   location: 'top',
// }

// app.use(VueProgressBar, options)
export default {
    components: { 
        'loading-component' : LoadingComponent
    },
    name : 'ExampleComponent',
    data() {
        return {
            isEditMode : false,
            products : [],
            plength : '',
            isLoad : true,
            product : new Form({
                id : '', name : '', price : ''
            }),
            search : '',
        }
    },
    methods: {
        success() {
            const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 1000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
            })

            Toast.fire({
            icon: 'success',
            title: this.isEditMode ? 'Product Successfully Updated' : 'Product Successfully Inserted'
            })
        },
        getData() {
            // this.$Progress.start();
            axios.get('http://127.0.0.1:8000/api/product')
            .then(res=>{
            this.products = res.data.data;
            // this.$Progress.finish();
            this.isLoad = false;
            })
            .catch(err => {
                // this.$Progress.fail();
            });
        },
        create() {
            this.isEditMode = false;
            this.product.id = '';
            this.product.name = '';
            this.product.price = '';
        },
        store() {
            this.product.post('http://127.0.0.1:8000/api/product')
            .then(res => {
                this.getData();
                this.success();
                this.create();
            })
        },
        edit(p) {
            this.isEditMode = true;
            this.product.id = p.id;
            this.product.name = p.name;
            this.product.price = p.price;
        },
        update() {
            this.product.put(`http://127.0.0.1:8000/api/product/${this.product.id}`)
            .then(res => {
                this.getData();
                this.success();
                this.create();
            });
        },
        destroy(p) {
            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                axios.delete(`http://127.0.0.1:8000/api/product/${p.id}`)
                .then(res => {
                    this.getData();
                    this.create();
                    Swal.fire(
                    'Deleted!',
                    'Your Product has been deleted.',
                    'success'
                    )
                });
            }
            })
        },
        searchProduct() {
            this.isLoad = true;
            axios.get(`http://127.0.0.1:8000/api/product?search=` + this.search)
            .then(res=>{
            this.products = res.data.data;
            this.isLoad = false;
            });
        },
    },
    created() {
        this.getData();
    },
}
</script>

<style>
    table tr td {
        vertical-align: middle;
    }
</style>