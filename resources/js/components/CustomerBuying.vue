<template>
    <div class="tab-content">
        <div class="tab-pane active" id="home">
            <h4>Total Purchase</h4>
            <div class="table-responsive">
                <table class="table table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Total</th>
                            <th>Cash</th>
                            <th>Due</th>
                            <th>Date</th>
                            <th>Invoice</th>
                        </tr>
                    </thead>
                    <tbody id="items">
                        <tr v-for="(sale, index) in sales" v-bind:key="sale.date">
                            <td>{{index+1}}</td>
                            <td>{{sale.total}}</td>
                            <td>{{sale.cash}}</td>
                            <td>{{sale.due}}</td>
                            <td>{{sale.date}}</td>
                            <td><a :href="'/invoice/'+sale.invoice">{{sale.invoice}}</a></td>
                        </tr>               
                    </tbody>
                    <div class="row">
                        <div class="col-md-4 col-md-offset-4 text-center">
                            <ul class="pagination" id="myPager"></ul>
                        </div>
                    </div>       
                </table> 
            </div><!--/table-resp-->
        </div><!--/tab-pane-->
        <div class="tab-pane" id="credited">
            <h4>Total Credited</h4>
            <table class="table table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Total</th>
                        <th>Pay By</th>
                        <th>Comments</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody id="items">
                    <tr v-for="(credit, index) in credits" v-bind:key="credit.date">
                        <td>{{index+1}}</td>
                        <td>{{credit.total}}</td>
                        <td>{{credit.pay_by}}</td>
                        <td>{{credit.comments}}</td>
                        <td>{{credit.date}}</td>
                        
                    </tr>               
                </tbody>
                <div class="row">
                    <div class="col-md-4 col-md-offset-4 text-center">
                        <ul class="pagination" id="myPager"></ul>
                    </div>
                </div>       
            </table> 
            
        </div><!--/tab-pane-->
            
    </div><!--/tab-pane-->    
        
                  
</template>

<script>
    export default {
        data(){
            return{
                sales: [],
                credits: []
            }
        },
        created() {           
            this.fetchSales();
            this.fetchCredit();
        },
        methods:{
            fetchSales(){
                 var id = window.location.href.split('/')[4];
                 fetch('/api/sales_by_customer/'+id)
                    .then(res => res.json())
                    .then(res => {
                        this.sales = res;
                        console.log(this.sales);
                })
            },
            fetchCredit(){
                var id = window.location.href.split('/')[4];
                 fetch('/api/credit_by_customer/'+id)
                    .then(res => res.json())
                    .then(res => {
                        this.credits = res;
                        console.log(this.credits);
                        console.log('credited')
                })
            }
        }
    }
</script>
