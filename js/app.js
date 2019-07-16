new Vue({
    el: '#app',
    data: {
        registro: {
            nombres: '',
            apellidos:'',
            email: '',
            mensaje:''
        },
        button:false,
        error:{class:'', mensaje:''},
    },
    created() {

        console.log('Montado');

    },
    methods: {
        scroll(selector) {
            $('html, body').animate({
                scrollTop: $(selector).offset().top
            }, 1500)
        },
        send() {
            if (this.registro.nombres.trim() == '') {
                this.error.class = 'text-red'
                this.error.mensaje = 'El nombre es incorrecto.'
            }else if(this.registro.apellidos.trim() == ''){
                this.error.class = 'text-red'
                this.error.mensaje = 'Los apellidos son incorrectos.'

            }else if(this.registro.email.trim() == ''){
                this.error.class = 'text-red'
                this.error.mensaje = 'El email es incorrecto.'

            }else if(this.registro.mensaje.trim() == ''){
                this.error.class = 'text-red'
                this.error.mensaje = 'El mensaje es incorrecto.'
            }else{
                $.ajax({
                    type: "POST",
                    url: "server",
                    data: this.registro,
                    success:(data)=>{
                        data = JSON.parse(data)
                        if (data.resp) {
                            this.error.class = "text-white"
                            this.error.mensaje = data.mensaje
                            this.button = true

                            setTimeout(() => {
                                window.location = 'confirmacion.html'
                            }, 1000);
                        }
                    }
                });
            }
        }
    },
})