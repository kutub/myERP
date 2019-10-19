<template>
    <tr @click="processSelection($event)" >
            <td>{{item.name}}</td>
            <td>
                <input type="text" name="sPrice" v-on:keyup="changePrice" v-model="item.price" class="form-control input-sm sPrice">
            </td>
            <td >
                <input type="text" name="sQuantity" v-on:keyup="changeQuantity"  v-model="item.quantity" class="form-control input-sm sQuantity">
            </td>
            <td class="itemTotal text-center" style="padding-top:12px; font-weight: bold;">
                {{item.price}}
            <td>
            <div class="btn-group pull-right">
                <button style="padding:2px 9px" @click="$emit('del-card', index)" class="btn btn-danger "><i class="fa fa-times"></i></button>
            </div>  
        </td>
    </tr>
</template>

<script>
export default {
    name: "salesItem",
    props:["item", "index"],
    methods: {
        processSelection(e) {
            var target = e.currentTarget;
            var totalPrice = target.querySelector('.itemTotal');
            this.targetItem = totalPrice;
        },
        changeQuantity: function(event){
            this.$nextTick(() => {
                var total = this.item.price*event.target.value;
                this.targetItem.innerHTML = total;
               
            });
        },
        changePrice: function(event){
            this.$nextTick(() => {
                var total = event.target.value * this.item.quantity;
                this.targetItem.innerHTML = total;
            });
        },
    }
}
</script>