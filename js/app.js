new Vue({
    el: '#app',
    data: {
        registro: {
            nombre: '',
            email: ''
        },
        button:false,
        error:{class:'', mensaje:''},
    },
    created() {


    },
    methods: {
        scroll() {
            $('html, body').animate({
                scrollTop: $("div #contacto").offset().top
            }, 1500)
        },
        send() {
            if (this.registro.nombre.trim() == '') {
                this.error.class = 'alert-danger'
                this.error.mensaje = 'El nombre es incorrecto.'
            }else if(this.registro.email.trim() == ''){
                this.error.class = 'alert-danger'
                this.error.mensaje = 'El email es incorrecto.'

            }else{
                // this.error = false;
                $.ajax({
                    type: "POST",
                    url: "server",
                    data: this.registro,
                    success:(data)=>{
                        data = JSON.parse(data)
                        if (data.resp) {
                            this.error.class = "alert-success"
                            this.error.mensaje = data.mensaje
                            this.button = true
                        }
                        // console.log( data.mensaje );
                    }
                });
            }
        }
    },
})