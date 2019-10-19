<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <form @submit.prevent="addCredit">
                        <ul class="list-group">
                            <li class="list-group-item">
                            <label for="customersName">Customer Name:</label>
                            <select @click="onSelectCustomer" v-model="credit.customer_id" id="customersName" class="form-control form-control-sm">
                                <option disabled value="">Please select Customer</option>
                                <option v-bind:value="customer.id" v-for="customer in customers" v-bind:key="customer.id">
                                {{ customer.name }}
                                </option>
                            </select>
                            </li>
                            <li class="list-group-item">
                            <label for="pay">Total credite:</label>
                            <input type="number" id="pay" v-model="credit.total" class="form-control form-control-sm" placeholder="Total credite">
                            </li>
                            <li class="list-group-item">
                            <label for="payBy">Credited By:</label>
                            <select id="payBy" v-model="credit.pay_by" class="form-control form-control-sm">
                                <option>Cash</option>
                                <option>Cheque</option>
                                <option>Bkash</option>
                            </select>
                            </li>
                            <li class="list-group-item">
                            <label for="due">Comments:</label>
                            <textarea v-model="credit.comments" id="due" class="form-control form-control-sm" placeholder="Comments"></textarea>
                            </li>
                        </ul>
                        <a href="" class="pull-left btn btn-primary">Cancel</a>
                        <button type="submit" class="pull-right btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data(){
            return {
                credit:{},
                customers:[],
                edit: false,
            }
        },
        methods:{
            onSelectCustomer(){
                fetch('api/customers')
                .then(res => res.json())
                .then(res => {
                    this.customers = res;
                })
            },
            addCredit(){
                console.log(this.credit)
                if(this.edit === false){
                    fetch('api/credited', {
                        method: 'post',
                        body: JSON.stringify(this.credit),
                        headers: {
                            'content-type': 'application/json',
                        }
                    })
                    .then(res => res.json())
                    .then(res => {
                        console.log(res);
                        window.location.reload();
                    })
                    .catch(err => console.log('error '+err))
                }else{

                }
            }
        }
    }
</script>
