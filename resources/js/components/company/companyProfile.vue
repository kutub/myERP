<template>
    <div class="container-fluid">
          <!-- /.nav-tabs-custom -->
         <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post -->
                    `<div class="box">
                        <!--box-header -->
                        <div class="box-header">
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label>Show entries:</label>
                                        </div>
                                        <div class="col-sm-5">
                                            <select name="example1_length" aria-controls="example1" class="form-control input-sm">
                                                <option value="10">10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select> 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <div class="row">
                                                <div class="col-sm-5">
                                                    <label >Filter By:</label>
                                                </div>
                                                <div class="col-sm-7">
                                                    <select name="example1_length" aria-controls="example1" class="form-control input-sm">
                                                        <option value="10">10</option>
                                                        <option value="25">25</option>
                                                        <option value="50">50</option>
                                                        <option value="100">100</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-7">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <label>Search:</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="search" class="form-control input-sm" placeholder="" aria-controls="example1">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            
                        </div>
                        <!-- /.box-header -->

                        <!--box-body -->
                        <div class="box-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Date</th>
                                        <th>Description</th>
                                        <th>Product Id</th>
                                        <th>Quantity</th>
                                        <th>Unite Price</th>
                                        <th>Total Value</th>
                                        <th>Stor In</th>
                                        <th>Truck No</th>
                                        <th>Fare</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(item, index) in chalan" v-bind:key="index">
                                        <td>{{index+1}}</td>
                                        <td>{{item.date}}</td>
                                        <td>{{item.detail}}</td>
                                        <td>{{item.product_id}}</td>
                                        <td>{{item.quantity}}</td>
                                        <td>{{item.unit_price}}</td>
                                        <td>{{item.Subtotal}}</td>
                                        <td>{{item.sent_to}}</td>
                                        <td>{{item.truck_no}}</td>
                                        <td>{{item.transport}}</td>
                                    </tr>
                                </tbody>
                                
                            </table>
                             <nav aria-label="Page navigation">
                                <ul class="pagination">
                                    <li>
                                    <a href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                    </li>
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                    <li>
                                    <a href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <!-- /.box-body -->

                    </div>
                                  
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="settings">
                <form class="form-horizontal">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputName" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Experience</label>

                    <div class="col-sm-10">
                      <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">Skills</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
    </div>
</template>

<script>
    export default {
        data(){
         return{
            chalan:[],
            company:[],
         }
        },
        created(){
          this.fetchCompanyChalan();
        },
        methods:{
          fetchCompanyChalan(){
            var id = window.location.href.split('/')[4];
            console.log(id);
            const url = '/api/manage-stocks/'+id;
            fetch(url)
            .then(res => res.json())
            .then(res => {
                this.chalan = res;
                console.log(this.chalan);
            })
          },
          
        }
             
    }
</script>
