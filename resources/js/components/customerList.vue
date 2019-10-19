<template>
    <div class="container">
        <section class="content-header">
            <h1>Customer management</h1>
            
            <ol class="breadcrumb">
                <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
            
        </section>
            
        <section class="content">
            <div class="box">

                <div class="box-header with-border">
                    <div class="row">
                        <div class="col-md-6">
                            <a href="/customers/create" class="btn btn-primary">Add Customer</a>
                        </div>
                        <div class="col-md-6">
                            <input class="form-control" v-model="searchQuery" placeholder="Customer Search"/>
                        </div>
                    </div>
                </div>
                
                <div class="box-body">
                    <table class="table table-bordered table-striped dt-responsive tables" width="100%">
                    
                    <thead>
                        <tr>
                        <th style="width:10px">#</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Area</th>
                        <th>Total Due</th>
                        <th>Description</th>
                        <th>Action</th>
                        </tr> 
                    </thead>
                
                    <tbody>

                            <tr v-for="customer in filterItems(customers)" :key="customer.id">
                                <td>{{customer.id}}</td>
                                <td><img :src="'uploads/customer_images/'+customer.image" class="img-thumbnail" width="40px"></td>
                                <td>{{customer.name}}</td>
                                <td>{{customer.phone}}</td>
                                <td>{{customer.area}}</td>
                                <td>{{customer.total}}</td>
                                <td>{{customer.description}}</td>
                                <td>
                                    <div class="btn-group">
                                        <a :href="'/customers/'+customer.id" class="btn btn-success">View</a>
                                        <a :href="'/customers/'+customer.id+'/edit'" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                        <button class="btn btn-danger"><i class="fa fa-times"></i></button>
                                    </div>
                                </td>
                            </tr>

                    </tbody>
                
                    </table>
                
                </div>
            </div>
        </section>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data() {
            return{
                customers:[],
                searchQuery: '',
            }
            
        },
        created() {
            this.getCustomerList();
        },
        methods:{
            getCustomerList(){
                fetch('api/customers')
                .then(res => res.json())
                .then(res => {
                    this.customers = res;
                    console.log(this.customers);
                })
            },
            filterItems: function(customers) {
                var app = this;
                return customers.filter(function(customer) {
                    let regex = new RegExp('(' + app.searchQuery + ')', 'i');
                    return customer.name.match(regex);
                })
            },
        },

    }
</script>
