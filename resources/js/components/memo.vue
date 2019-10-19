<template style="margin-left:-50px">
<div class="container" style="padding:0">

<!-- Main content -->
<section class="invoice" style="">
  <div class="row">
      <div class="col-xs-12">
          <h3>
            <i class="fa fa-globe"></i> মাসুম এন্টারপ্রাইজ
          </h3>
          <h5>ডিলার: জিপিএইচ ইস্পাত, ডিলাক্স সিমেন্ট</h5>
           <address>
          শীলকূপ টাইম বাজার বাঁশখালী চট্টগ্রাম ।<br>
          Phone: 01825144925, 01830117291<br>
          01820034572<br>
          Email: masument825144@gmail.com
        </address>
      </div>
  </div>
  <!-- title row -->
 
  <!-- info row -->
  <div class="row invoice-info">
    <!-- /.col -->
    <div class="col-sm-4 " style="margin-bottom:15px">
      To <br>
        <input type="text" style="border-top:none; border-left:none;border-right:none" v-model="buyer.name" placeholder="Name"><br>
        <input style="border-top:none; border-left:none;border-right:none" type="text" v-model="buyer.area" placeholder="Address"><br>
        <input type="text" style="border-top:none; border-left:none;border-right:none" v-model="buyer.phone" placeholder="Phone">
     
    </div>
    <!-- /.col -->
    <div class="col-sm-4 ">
     
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

  <!-- Table row -->
  <div class="row">
    <div class="col-xs-12">
      <table class=" ">
        <thead>
        <tr>
          <th style="font-size:12px; padding:0; width:180px !important">Product Name</th>
          <th style="font-size:12px; padding:0; width:20px !important">Qt</th>
          <th style="font-size:12px; padding:0; width:50px !important">Total</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="item in invoiceItem" v-bind:key="item.id">
          <td style="font-size:14px; padding:0; width:180px!important">{{item.product_name}}</td>
          <td style="font-size:14px; padding:0; width:20px!important">{{item.quantity}}</td>
          <td style="font-size:14px; padding:0; width:00px!important">{{item.taotal_price}}</td>
        </tr>
          </tbody>
      </table>
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

  <div class="row">
    <!-- accepted payments column -->
    <!-- /.col -->
    <div class="col-xs-12">
      <div class="table-responsive">
        <hr>
        <table class="">
          <tr style="border-top:1px;">
            <th style="width:200px">Subtotal:</th>
            <td style="width:10px">{{subTotal}}</td>
          </tr>
          <tr style="border-top:1px;">
            <th style="width:200px">Pay:</th>
            <td style="width:10px">{{invoiceItem[0].cash}}</td>
          </tr>
          <tr style="border-top:1px;">
            <th style="width:200px">Due:</th>
            <td style="width:10px">{{invoiceItem[0].due}}</td>
          </tr>
        </table>
      </div>
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
<div class="row">
  <div class="col-xs-2" style="margin-left:100px;">
    <p style="margin-top:50px;text-align:center;border-top:1px solid #000">Signature</p>
  </div>
</div>
  <!-- this row will not appear when printing -->
  <div class="row no-print">
    <div class="col-xs-12">
  
     <a style="margin-left:180px" @click.prevent="printme" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
  
    </div>
  </div>
</section>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                invoiceItem:[],
                buyer:[],
                subTotal:0,
                date:'',
                customer_id:0,
            }
        },
        created() {
            this.fetchInvoice();
            this.fetchCustomer();
        },
        methods:{
            printme(){
                window.print();
            },
            fetchInvoice(){
            var id = window.location.href.split('/')[4];
            var url = '/api/invoice/'+id;
            
            fetch('/api/invoice/'+id)
            .then(res => res.json())
            .then(res => {
                console.log(res);
                this.invoiceItem = res;
                var sum = 0;
                this.date = this.invoiceItem[0].created_at;
                this.customer_id = this.invoiceItem[0].customer_id;
                for(var i = 0; this.invoiceItem.length > i; i++){
                    sum += this.invoiceItem[i].taotal_price;
                }
                this.subTotal = sum;
            })
          },
         
          fetchCustomer(id){
            setTimeout(function(){
            var id = window.location.href.split('?')[1];
            var url = '/api/customerAddress/'+id;
            console.log(url);
            fetch(url)
            .then(res => res.json())
            .then(res => {
                return this.buyer = res;
            })
            }, 1000);
            
          },
        }
    }
</script>
