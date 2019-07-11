new Vue({
    el: '#app',
    data: {
        registro: {
            nombre: '',
            email: ''
        },
        error:false,
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
                this.error = 'El nombre es incorrecto.'
            }else if(this.registro.email.trim() == ''){
                this.error = 'El email es incorrecto.'
            }else{
                this.error = false;
                $.ajax({
                    type: "POST",
                    url: "server",
                    data: this.registro,
                    success(resp){
                        console.log( JSON.parse(resp));
                        
                    }
                });
            }
        }
    },
})