// ckeditor 自帶gdiv
Vue.config.ignoredElements = ['gdiv']
var app = new Vue({
    el: '#product-inner',
    data: {
        count: 0,
        product_id: '',
        is_loading:false,
        callback: false,
        callback_msg: ''
    },
    methods: {
        addToCart() {
            var count = parseInt(this.count)
            if(!/^[0-9]*[1-9][0-9]*$/.test(count)){
                this.callback = true;
                this.callback_msg = 'Illegal Amount'
                return
            }
            this.is_loading = true
            axios.post('/addToCart', {
                count: this.count,
                product_id: this.product_id,
                product_price: this.product_price
            })
                .then(function (response) {
                    app.is_loading = false;
                    app.callback = true;
                    app.callback_msg = response.data.msg
                    // 更新navbar購物車數字
                    $('.shop-num').each(function () {
                        $(this).text(Number($(this).text()) + 1);
                    })
                })
                .catch(function (error) {
                    app.is_loading = false;
                    app.callback = true;
                    app.callback_msg = 'Add To Cart failly'
                });
        }
    },
    mounted() {
        this.product_id = (this.$refs.product_id) ? this.$refs.product_id.value : '';
        // console.log(this.limitation)
    }
})


