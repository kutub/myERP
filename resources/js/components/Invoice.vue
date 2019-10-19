<template style="margin-left:50px;padding:50px;">
<section class="container" style="background: #fff;">
  <div class="row">
    <div class="col-md-12" style="text-align:center; background:#9E1030;color:#fff;margin-bottom:20px;">
      <h2>মেসার্স মাসুম এন্টারপ্রাইজ</h2>
      <h4>ডিলার: জিপিএইচ ইস্পাত, ডিলাক্স সিমেন্ট</h4>
      <p>শীলকূপ, টাইম বাজার, বাঁশখালী, চট্টগ্রাম ।</p>
    </div>
    <div class="col-md-12" style="text-align:center">
      <p>এখানে রড়,সিমেন্ট,বালি,ইট,কংকর,ঢেউটিন,প্লেইন সীট,পীচ বোর্ড, প্লাষ্টিক ডোর,ও হার্ডওয়ার সামগ্রী পাইকারী ও খুচরা বিক্রয় করা হয়</p>
      <p>প্রোপাটরঃ আবু বকরঃ০১৮২৫১৪৪৯২৫ ,ম্যানেজারঃ আরিফ উল্লাহঃ ০১৮২২৭৪৭৪৩৯; এরফানঃ০১৮২০০৩৪৫৭২</p>
    </div>
  </div>
  <div class="row" style="margin-top:15px;margin-bottom:20px;">
    <div class="col-md-8">
      <div class="row">
        <div class="col-md-2" >
          <span style="text-align:right">নাম :</span>
        </div>
        <div class="col-md-10">
          <input type="text" class="form-control"  placeholder="নাম ">
        </div>
      </div>
      <div class="row">
        <div class="col-md-2">
          <span>ঠিকানা :</span>
        </div>
        <div class="col-md-10">
          <input type="text" class="form-control" style="border-top:none;" id="inlineFormInputGroupUsername" placeholder="ঠিকানা">
        </div>
      </div>
      <div class="row">
        <div class="col-md-2">
          <span>মোবাইল :</span>
        </div>
        <div class="col-md-10">
          <input type="text" class="form-control" style="border-top:none;" id="inlineFormInputGroupUsername" placeholder="মোবাইল">
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <p>তারিখ : {{invoiceItem[0].created_at}}</p>
      <p>ভাউচার নংঃ {{invoiceItem[0].invoice}}</p>
    </div>
  </div>
  <div class="row">
      <div class="col-xs-12 table-responsive">
        <table class="table table-striped  table-bordered" >
          <thead>
          <tr >
            <th style="width:125px;text-align:center">সংখ্যা </th>
            <th style="text-align:center;width:480px;">বিবরণ</th>
            <th style="width:123px;text-align:center">পরিমাণ</th>
            <th style="text-align:center">দর</th>
            <th style="text-align:center">টাকা </th>
          </tr>
          </thead>
          <tbody>
            <tr v-for="(item, index) in invoiceItem" v-bind:key="item.id">
              <td style="text-align:center">{{index+1}}</td>
              <td style="text-align:center">{{item.product_name}}</td>
              <td style="text-align:center">{{item.quantity}}</td>
              <td style="text-align:center">{{(item.taotal_price/item.quantity)}}</td>
              <td style="text-align:center">{{item.taotal_price}}</td>
            </tr>
          </tbody>
        </table>
      </div>
  </div>
  <div class="row">
    <div class="col-md-8 invoice-col">
      <div class="row">
        <div class="col-md-2" style="text-align:right">
          <span>কথায় :</span>
        </div>
        <div class="col-md-10">
          <input type="text" class="form-control" id="inlineFormInputGroupUsername" placeholder="কথায় ">
        </div>
      </div>
      <div class="row">
        <div class="col-md-2" style="text-align:right">
          <span>পরিবহন খরচ :</span>
        </div>
        <div class="col-md-10">
          <input type="text" v-model="invoiceItem[0].transport" class="form-control" id="inlineFormInputGroupUsername" placeholder="পরিবহন খরচ ">
        </div>
      </div>
      <div class="row">
        <div class="col-md-2" style="text-align:right">
          <span>ড্রাইভার  :</span>
        </div>
        <div class="col-md-10">
          <input type="text" class="form-control" style="border-top:none;" id="inlineFormInputGroupUsername" placeholder="ড্রাইভার ">
        </div>
      </div>
    </div>
    <div class="col-md-4" style="text-align:center">
      <div class="row">
        <div class="col-md-4 invoice-col">
          <span>মোট :</span>
        </div>
        <div class="col-md-8 invoice-col">
          <p>{{subTotal}}</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 invoice-col">
          <span>সাবেক  বাকী:</span>
        </div>
        <div class="col-md-8 invoice-col">
          <p><input type="text" class="form-control" v-model="previousDue" style="text-align:center" placeholder="সাবেক বাকী"></p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 invoice-col" >
          <span>সাবেক  জমা :</span>
        </div>
        <div class="col-md-8 invoice-col">
          <p><input type="text" class="form-control" v-model="previousCredit" style="text-align:center" placeholder="সাবেক জমা"></p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 invoice-col">
          <span>সর্বমোট :</span>
        </div>
        <div class="col-md-8 invoice-col">
          <p>{{(parseInt(subTotal) + parseInt(previousDue)) - previousCredit}}</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 invoice-col" >
          <span>জমা :</span>
        </div>
        <div class="col-md-8 invoice-col">
          <p>{{invoiceItem[0].cash}}</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 invoice-col " >
          <span>জমা/বাকী :</span>
        </div>
        <div class="col-md-8 invoice-col">
          <p>{{((parseInt(subTotal) + parseInt(previousDue)) - previousCredit) - parseInt(invoiceItem[0].cash)}}</p>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12" style="text-align:center;margin-top:25px;margin-bottom:20px;">
      <p>দুনিয়া জরুরত , আখেরাত জরুরী | দুনিয়া খনস্তায়ী, আখিরাত চিরস্থায়ী</p>
    </div>
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-4 invoice-col">
          <p style="border-top:1px solid #000;text-align:center">ক্রেতার স্বাক্ষর </p>
        </div>
        <div class="col-md-4 invoice-col">
          <p> বিঃদ্রঃবিক্রিত মাল ফেরত লওয়া হয়।</p>
        </div>
        <div class="col-md-4 invoice-col">
          <p style="border-top:1px solid #000;text-align:center">পক্ষে: মেসার্স মাসুম এন্টারপ্রাইজ</p>
        </div>
      </div>
    </div>
  </div>
  <div class="row no-print">
        <div class="col-xs-12">
          <a @click.prevent="printme" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
          <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
          </button>
          <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generate PDF
          </button>
        </div>
  </div>
</section>
 
</template>

<script>
    export default {
        data(){
            return {
                invoiceItem:[],
                subTotal:0,
                customer:{},
                previousDue: 0,
                previousCredit: 0,
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
                this.customer = res;
                console.log(this.customer);
            })
            }, 1000);
            
          },
        }
    }
</script>
