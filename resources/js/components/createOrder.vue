<template>
<div>

  <div class="row">
          <!-- Product Add Container -->
          <div class="col-md-5"> 
            <div class="box-header with-border" style="padding:0px 0px 10px 5px;margin-bottom:20px;">
                <a href="/sales-report" class="btn btn-success">Daily Sales</a>
              </div>
            <table class="table table-bordered table-striped dt-responsive " id="productTable" width="100%">
              <thead>
                
                <tr>
                  <th>Item Name</th>
                  <th style="width:80px">Price</th>
                  <th style="width:80px">Quantity</th>
                  <th>Total</th>
                  <th>Action</th>
                </tr> 
    
              </thead>
        
              <tbody style="border-top:none;" @click="onChangeQuantity($event)" class="allSaleItem" v-for="(item, index) in cardItem" v-bind:key="index">
                    <sales-item  v-on:del-card="deleteCard" v-bind:index="index" v-bind:item="item"/>
              </tbody>
        
            </table>
           
            <ul class="list-group">
              <li class="list-group-item">
                <span>Quantity of {{totalItem}} Items:</span>
                <span class="pull-right">{{totalQuantity}}</span>
              </li>
              <li class="list-group-item">
                <span>Sub Total:</span>
                <span class="pull-right">{{subTotal}}</span>
              </li>
              <li class="list-group-item">
                <span>Vat :</span>
                <span class="pull-right">0%</span>
              </li>
              <li class="list-group-item">
                <span>Total:</span>
                <span class="pull-right">{{subTotal}}</span>
              </li>
            </ul>
            <form @submit.prevent="addSales">
              <ul class="list-group">
                <li class="list-group-item">
                  <label for="customersName">Customer Name:</label>
                  <select @click="onSelectCustomer" v-model="sales.customer_id" id="customersName" class="form-control form-control-sm">
                    <option disabled value="">Please select Customer</option>
                    <option v-bind:value="customer.id" v-for="customer in customers" v-bind:key="customer.id">
                      {{ customer.name }}
                    </option>
                  </select>
                </li>
                <li class="list-group-item">
                  <label for="pay">Pay:</label>
                  <input type="text" id="pay" v-on:keyup="submitCash" v-model="sales.pay" class="form-control form-control-sm" placeholder="Pay">
                </li>
                <li class="list-group-item" style="position:reletive">
                  <h5><span style="padding-right:20px;">Due: </span><strong style="font-size:16px;color:red;">{{subTotal - sales.pay || 0}}</strong></h5>
                  
                </li>
                <li class="list-group-item">
                  <label for="pay">Transport:</label>
                  <input type="text" id="pay" v-model="sales.transport" class="form-control form-control-sm" placeholder="Transport">
                </li>
                <li class="list-group-item">
                  <label for="payBy">Pay By:</label>
                  <select id="payBy" v-model="sales.pay_by" class="form-control form-control-sm">
                    <option>Cash</option>
                    <option>Cheque</option>
                    <option>Bkash</option>
                  </select>
                </li>
                <li class="list-group-item">
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="inlineCheckbox1" value="memo" v-model="printtype">
                    <label class="form-check-label" for="inlineCheckbox1">Memo</label>
                 </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="inlineCheckbox2" value="invoice" v-model="printtype">
                    <label class="form-check-label" for="inlineCheckbox2">Invoice</label>
                  </div>
                </li>
              </ul>
          
              <a href="" class="pull-left btn btn-primary">Cancel</a>
              <button type="submit" class="pull-right btn btn-primary">Submit</button>
            </form>

          </div> 
          <!-- End Product Add Container -->
    
          <!-- Product List Container -->
          <div class="col-md-7"> 
              <div class="box-header with-border" style="padding:0px 0px 10px 5px">
                <a href="/stocks/create" class="btn btn-primary">Add Product</a>
                
                <div class="box-tools pull-right">
                    <input class="form-control" type="text" placeholder="Search Product" style="border-radius:4px;height:30px;">
                </div>
              </div>
              <div class="row" style="padding:0 15px">
                  <div class="col-md-2" style="margin-top:15px; cursor: pointer; padding:5px" v-for="stock in stocks" v-bind:key="stock.id">
                      <div class="card text-center" @click="addToCard(stock.id)" :id="stock.id">
                        <img style="max-height:80px;" :src="'uploads/product_images/'+stock.image" alt="">
                        <div class="card-body" style="padding:0 0 5px;">
                          <h5 class="card-title">{{stock.name}}</h5>
                          <b style="margin-bottom:8px;" v-if="stock.stock !== 0">Stocks: ({{stock.stock}})</b>
                          <b style="color:red;margin-bottom:8px;" v-if="stock.stock == 0">Out of Stock</b>
                        </div>
                  </div>
              </div>
            </div>
             
          </div> 
          <!-- End Product List Container -->
    
        </div>   
</div>
</template>
<script>
import salesItem from "./salesItem.vue";
import { runInThisContext } from 'vm';
export default {
  components: {
    salesItem
  },
  data() {
    return {
      stocks: [],
      cardItem:[],
      quantityEdit: '',
      totalQuantity: 0,
      totalItem: 0,
      subTotal: 0,
      targetItem:'',
      item: '',
      customers:[],
      selected:'',
      sales: {},
      due:'',
      updateStock:[],
      printtype: '',
      article: {
        image: '',
        name: '',
        stock: ''
      },
      article_id: '',
      pagination: {},
      edit: false,
    };
  },
  created() {
    this.fetchStocks();
  },
  methods: {
     fetchStocks(){
         fetch('/api/apistocks')
         .then(res => res.json())
         .then(res => {
             this.stocks = res;

         })
     },
     addToCard(id){
       fetch(`api/apistock/${id}`)
       .then(res => res.json())
       .then(res => {
          this.item = res;
          this.updateStock = res;
          this.item['quantity'] = 1;
          this.total = this.item.price;
          this.cardItem.push(this.item);
          this.totalItem = this.cardItem.length;
          var qntSum = 0;
          var subTol = 0;
          for(var i = 0; i < this.totalItem; i++){
            qntSum += parseInt(this.cardItem[i].quantity);
            subTol += parseInt(this.cardItem[i].price);
          }
          this.totalQuantity = qntSum;
          this.subTotal = subTol;
       })
     },
     deleteCard(id){
        this.cardItem.splice(id, 1)
     },
     onChangeQuantity(e){
        var totalPrice =  document.querySelectorAll('.itemTotal');
        var totalQuantity = document.querySelectorAll('.sQuantity');
        var sumValue = 0;
        var sunQuan = 0;
        for(var i = 0; i < totalPrice.length; i++){
          sunQuan += parseInt(totalQuantity[i].value);
          sumValue += parseInt(totalPrice[i].innerText);
        }
        this.subTotal = sumValue;
        this.totalQuantity = sunQuan;
     },
     onSelectCustomer(){
      fetch('api/customers')
       .then(res => res.json())
       .then(res => {
          this.customers = res;
          console.log(this.customers);
       })
     },
     submitCash(){
       this.sales.due = (this.subTotal - this.sales.pay);
     },

     addSales(){
       const invoice = 'inv'+Math.floor(Math.random() * 100000);
        this.sales['total'] = this.subTotal;
        this.sales['created_by'] = 'emon';
        this.sales['invoice'] = invoice;
       if(this.edit === false){
         for(var i = 0; this.cardItem.length > i; i++){
           this.cardItem[i]['invoice'] = invoice;
           this.cardItem[i]['customer_id'] = this.sales.customer_id;
           this.cardItem[i]['cash'] = parseInt(this.sales.pay);
           this.cardItem[i]['due'] = parseInt(this.sales.due);
           this.cardItem[i]['transport'] = parseInt(this.sales.transport);
           this.cardItem[i]['total_price'] = this.cardItem[i].price*this.cardItem[i].quantity;
           this.cardItem[i].stock = (this.cardItem[i].stock - this.cardItem[i].quantity);
            fetch('api/orders', {
              method: 'post',
              body: JSON.stringify(this.cardItem[i]),
              headers: {
                'content-type': 'application/json'
              }
              
            })
            .then(res => res.json())
            .then(data => {
              console.log(data);
            })
            .catch(err => console.log(err))
            const url = 'api/stockUpdate/'+this.cardItem[i].id;
            fetch(url, {
                method: 'put',
                body: JSON.stringify(this.cardItem[i]),
                headers: {
                  'content-type': 'application/json'
                }
                
              })
              .then(res => res.json())
              .then(data => {
                console.log(data);
              })
            .catch(err => console.log(err))
         }
        fetch('api/add-sales', {
              method: 'post',
              body: JSON.stringify(this.sales),
              headers: {
                'content-type': 'application/json'
              }
            })
            .then(res => res.json())
            .then(res => {
              window.location.href='/'+this.printtype+'/'+invoice+'?'+this.sales.customer_id;
            })
            .catch(err => console.log(err))       

       }else{

       }
     }
     
  }
};
</script>