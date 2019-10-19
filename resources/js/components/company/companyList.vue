<template>
<div class="box box-primary" >
    <div class="box-header with-border">
        <div class="box-title">
            <button type="button" class="btn btn-primary btn-block margin-bottom" data-toggle="modal" data-target="#modal-default">
                Add New Company
            </button>
        </div>

        <div class="box-tools pull-right">
        <div class="has-feedback">
            <input type="text" class="form-control input-sm" placeholder="Search Mail">
            <span class="glyphicon glyphicon-search form-control-feedback"></span>
        </div>
        </div>
        <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body no-padding">
        <div class="mailbox-controls">
        <!-- Check all button -->
        <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
        </button>
        <div class="btn-group">
            <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
            <button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
            <button type="button" class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
        </div>
        <!-- /.btn-group -->
        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
        <div class="pull-right">
            1-50/200
            <div class="btn-group">
            <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
            <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
            </div>
            <!-- /.btn-group -->
        </div>
        <!-- /.pull-right -->
        </div>
        <div class="table-responsive mailbox-messages">
        <table class="table table-hover table-striped">
            <tbody>
                <tr v-for="(company, index) in companies" v-bind:key="index">
                    <td><input type="checkbox"></td>
                    <td class="mailbox-star">{{index+1}}</td>
                    <td class="mailbox-name"><a :href="'/companies/'+company.id">{{company.name}}</a></td>
                    <td class="mailbox-name"><a :href="'/companies/'+company.id">{{company.detail}}</a></td>
                    <td class="mailbox-subject"><b>{{company.phone}}</b></td>
                    <td class="mailbox-attachment">{{company.account_no}}</td>
                </tr>
            </tbody>
        </table>
        <!-- /.table -->
        </div>
        <!-- /.mail-box-messages -->
    </div>

    <!-- /.box-body -->
    
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Add New Company</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span pull-left aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                   <form class="form-horizontal" @submit.prevent="saveCompanyInfo">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-10">
                                    <input v-model="company.name" type="text" class="form-control" id="inputEmail3" placeholder="Name of Company">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Email</label>

                                <div class="col-sm-10">
                                    <input v-model="company.email" type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Mobile</label>

                                <div class="col-sm-10">
                                    <input v-model="company.phone" type="text" class="form-control" id="inputPassword3" placeholder="Mobile No">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Company Details</label>
                                <div class="col-sm-10">
                                    <textarea v-model="company.detail" class="form-control"  placeholder="Company Details" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Account</label>
                                <div class="col-sm-10">
                                    <input v-model="company.account_no" type="text" class="form-control" id="inputPassword3" placeholder="Bank Account No">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Account Details</label>
                                <div class="col-sm-10">
                                    <textarea v-model="company.account_address" class="form-control" placeholder="Account Details" rows="3"></textarea>
                                </div>
                            </div>

                        </div>
                        <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-info pull-right">Save</button>
                            </div>
                        <!-- /.box-footer -->
                    </form>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<!-- /. box -->
        </div>
    </div>
</div>

</template>

<script>
    export default {
       data(){
           return {
               company:{},
               companies:[],
           }
       },
       created(){
           this.getAllCompanies();
       },
       methods:{
            saveCompanyInfo(){
               console.log(this.company);
                fetch('api/companies', {
                    method: 'post',
                    body: JSON.stringify(this.company),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                .then(res => res.json())
                .then(data => {
                    window.location.reload();
                })
                .catch(err => console.log(err))
           },
            getAllCompanies(){
                fetch('api/companies')
                .then(res => res.json())
                .then(res => {
                    this.companies = res;
                    console.log(this.companies);
                })
            },

       }
    }
</script>
