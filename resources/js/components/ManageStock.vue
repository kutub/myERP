<template>
    <div class="container-fluid">
        <section class="content-header">
            <h1>Stock management</h1>
            
            <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
            </ol>
        
        </section>                              
    
    <section class="content">
        <div class="box">

        <div class="box-header with-border">
            <a @click="getCompanyList" data-toggle="modal" data-target="#newStock" class="btn btn-primary" style="color:#fff">New Stock</a>
        </div>
        
        <div class="box-body">

            <table class="table table-bordered table-striped dt-responsive tables" width="100%">
            
                <thead>
                    <tr>
                    <th style="width:10px">#</th>
                    <th>Date</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Total Value</th>
                    <th>Payments</th>
                    <th>Total Balance</th>
                    <th>Truck No</th>
                    <th>Fare</th>
                    <th>Action</th>
                    </tr> 
                </thead>
        
                <tbody>
                    <tr v-for="(stock, index) in allStock" v-bind:key="stock.id">
                        <td>{{index+1}}</td>
                        <td>{{stock.date}}</td>
                        <td>{{stock.detail}}</td>
                        <td>{{stock.quantity}}</td>
                        <td>{{stock.unit_price}}</td>
                        <td>{{stock.total_value}}</td>
                        <td>{{'Payments'}}</td>
                        <td>{{"Total Balance"}}</td>
                        <td>{{stock.truck_no}}</td>
                        <td>{{stock.transport}}</td>
                        <td>
                            <div class="btn-group">
                                
                                <a  class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                <button class="btn btn-danger"><i class="fa fa-times"></i></button>
            
                            </div>  
                        </td>
                    </tr>
                    <tr >
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>SubTotal:</td>
                        <td>{{allStock[0].Subtotal}}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                        <div class="btn-group">
                            
                            <a  class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                            <button class="btn btn-danger"><i class="fa fa-times"></i></button>
        
                        </div>  
                        </td>
                    </tr>
                </tbody>
        
            </table>
        
        </div>
        </div>
    </section>    




<!-- Modal -->
<div id="newStock" class="modal fade" role="dialog">

    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
    
        <form @submit.prevent="addNewStcok">
    
            <div class="modal-header" style="background: #3c8dbc; color: #fff">
    
                <span><button style="padding:0;margin:0;float:left" type="button" class="close" data-dismiss="modal">&times;</button></span>
                <h4 class="modal-title">New Stock</h4>
    
            </div>
    
            <div class="modal-body">
            <div class="box-body">
                <div class="form-group row">
                    <div class="col-xs-12">
                        <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-exchange" aria-hidden="true"></i></span>
                            <select @change="getCategoryByCompany($event)" v-model="newStock.company_id" class="form-control input-lg" name="company_id">
                                    
                                    <option disabled value="">Please select getCompanyList</option>
                                    <option v-bind:value="company.id" v-for="company in companies" v-bind:key="company.id">
                                    {{ company.name }}
                                    </option>

                            </select>
                        
                        </div>
                    </div>
                </div>
                <!-- Company input -->
                <div class="form-group row">
                    <div class="col-xs-6">
                        <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-th"></i></span>
            
                            <select @change="getProductByCategory($event)" v-model="newStock.catagory_id" class="form-control input-lg" name="newCategory">
            
                                <option disabled value="">Please select Customer</option>
                                <option v-bind:value="category.id" v-for="category in categoryList" v-bind:key="category.id">
                                {{ category.name }}
                                </option>

                            </select>
                
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-code"></i></span>
                            <select @change="getProductId($event)" v-model="newStock.product_id" class="form-control input-lg" name="newCategory">

                                <option disabled value="">Please select Customer</option>
                                <option v-bind:value="product.id" v-for="product in productList" v-bind:key="product.id">
                                {{ product.name }}
                                </option>

                            </select>
                    
                        </div>
                    </div>
                </div> 
                <!-- INPUT BUYING PRICE -->
                <div class="form-group row">
    
                    <div class="col-xs-6">
                        <div class="input-group">
                        
                        <span class="input-group-addon"><i class="fa fa-check"></i></span>
                        <input v-model="newStock.quantity" type="text" class="form-control input-lg" id="newStock" name="newStock" placeholder="Quantity" required>
    
                        </div>
                    </div>
    
                    <!-- INPUT SELLING PRICE -->
                    <div class="col-xs-6">
                        <div class="input-group">
                        
                        <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span> 
                        <input v-model="newStock.unit_price" type="text" class="form-control input-lg" id="newSellingPrice" name="newSellingPrice" placeholder="Unite Price" required>
    
                        </div>
                    </div>
    
                </div>
                <div class="form-group row">
    
                        <div class="col-xs-6">
                            <div class="input-group">
                            
                            <span class="input-group-addon"><i class="fa fa-truck" aria-hidden="true"></i></span>
                            <input v-model="newStock.truck_no" type="text" class="form-control input-lg" id="truckNo" name="truckNo" placeholder="Truck No">
        
                            </div>
                        </div>
        
                        <!-- INPUT SELLING PRICE -->
                        <div class="col-xs-6">
                            <div class="input-group">
                            
                            <span class="input-group-addon"><i class="fa fa-money" aria-hidden="true"></i></span> 
                            <input  v-model="newStock.transport" type="text" class="form-control input-lg" id="transport" name="transport" placeholder="Fare">
        
                            </div>
                        </div>
        
                </div>
                <div class="form-group row">
    
                        <div class="col-xs-6">
                            <div class="form-group">
                                <div class="form-check">
                                    <input v-model="newStock.sent_to"  class="form-check-input" type="radio" name="gridRadios" value="Stock In Stor">
                                    <label style="margin-left:15px;" class="form-check-label" for="gridCheck">
                                    Stock In Stor 
                                    </label>
                                </div>
                            </div>
                        </div>
        
                        <!-- INPUT SELLING PRICE -->
                        <div class="col-xs-6">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gridRadios" value="sent_to">
                                <label style="margin-left:15px;" class="form-check-label" for="gridCheck">
                                Stock Transfer
                                </label>
                            </div>
                        </div>

                        <div class="col-xs-12">
                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-exchange" aria-hidden="true"></i></span>
                                <select v-model="newStock.sent_to" class="form-control input-lg" name="send_to">
                
                                    <option value="">Send To</option>
                                    <option value="drills">Drills</option>
                                    <option value="scaffold">Scaffold</option>
                                    <option value="construction">Construction materials</option>

                                </select>
                            
                            </div>
                        </div>
        
                </div>
                <!--Input Code -->

    
                <!-- input description -->
                <div class="form-group">
                <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
                    <input class="form-control input-lg" v-model="newStock.total_value"  type="text" name="newDescription" placeholder="Add Description" >
    
                </div>
                </div>
    
                <!-- input category -->
                <div class="form-group">

                    <textarea class="form-control" v-model="newStock.detail" placeholder="Details" rows="3"></textarea>

                </div>
        </div>   
        </div>
    
            <!--=====================================
            FOOTER
            ======================================-->
    
            <div class="modal-footer">
    
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
    
            <button type="submit" class="btn btn-primary">Save product</button>
    
            </div>
    
        </form>
    
        </div>
    
    </div>
      
</div>
      
      <!--====  End of module add Product  ====-->
</div>
</template>

<script>
    export default {
        data(){
            return{
                newStock:{},
                allStock:[],
                categoryList:[],
                productList:[],
                productId:'',
                singleProduct:[],
                companies:[]
            }
        },
        created(){
            this.getAllStocks();
        },
        methods: {
            addNewStcok(){
                fetch('api/manage-stocks', {
                    method: 'post',
                    body: JSON.stringify(this.newStock),
                    headers: {
                        'content-type': 'application/json'
                    }
                
                })
                .then(res => res.json())
                .then(data => {
                })
                if(this.newStock.sent_to == 'Stock In Stor'){
                    this.singleProduct.stock = (parseInt(this.singleProduct.stock) + parseInt(this.newStock.quantity));
                    const url = 'api/stockUpdate/'+this.productId;
                    fetch(url, {
                        method: 'put',
                        body: JSON.stringify(this.singleProduct),
                        headers: {
                        'content-type': 'application/json'
                        }
                    
                    })
                    .then(res => res.json())
                    .then(data => {
                        window.location.reload();
                    })
                    .catch(err => console.log(err))
                }
                
            },
            getAllStocks(){
                fetch('api/manage-stocks')
                .then(res => res.json())
                .then(res => {
                    this.allStock = res;
                })
            },
            getCategoryByCompany(event){
                fetch('/categories/'+event.target.value)
                .then(res => res.json())
                .then(res => {
                    this.categoryList = res;
                })
            },
            getCompanyList(){
                fetch('/api/companies')
                .then(res => res.json())
                .then(res => {
                    this.companies = res;
                })
            },
            getProductByCategory(event){
                const url = '/product-list/'+event.target.value
                fetch(url)
                .then(res => res.json())
                .then(res => {
                    this.productList = res;
                })
            },
            getProductId(event){
                this.productId = event.target.value;
                fetch(`api/apistock/${this.productId}`)
                .then(res => res.json())
                .then(res => {
                    this.singleProduct = res;
                })
            }
        }

    }
</script>
