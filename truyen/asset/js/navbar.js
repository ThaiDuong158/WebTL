const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

const login = $('#login')
const register = $('#register')
const btnsLoad = $$('.btn-load')
const txtsClear = $$('.txt-clear')
const app = {
    clearText() {
        Array.from(txtsClear).forEach((txtClear) => {
            txtClear.value = ``
        })
    },
    close(temp) {
        temp.querySelector('.close').onclick = (e) => {
            this.clearText()
            temp.classList.add('d-none');
        }
    },
    hadleEvents() {
        // Mở form đăng nhập
        login.addEventListener('click', (e) => {
            let temp = $('.appLogin')
            temp.classList.remove('d-none');
            this.close(temp);
        })
        // Mở form đăng ký
        register.onclick = (e) => {
            let temp = $('.appRegister')
            temp.classList.remove('d-none');
            this.close(temp);
        }
        $('#retry').onclick = (e) => {
            $('.appLogin').classList.add('d-none');
            temp = $('.appRetry')
            temp.classList.remove('d-none');
            this.close(temp);
        }
        $('#forgot').onclick = (e) => {
            $('.appLogin').classList.add('d-none');
            temp = $('.appForgot')
            temp.classList.remove('d-none');
            this.close(temp);
        }
        // Từ đăng nhập qua đăng ký
        Array.from($$('.formRegister')).forEach((register) => {
            register.onclick = (e) => {
                $('.appLogin').classList.add('d-none');
                let temp = $('.appRegister')
                temp.classList.remove('d-none');
                this.clearText()
                this.close(temp);
            }
        })
        // Từ đăng ký qua đăng nhập
        $('.formLogin').onclick = (e) => {
            $('.appRegister').classList.add('d-none');
            let temp = $('.appLogin')
            temp.classList.remove('d-none');
            this.clearText()
            this.close(temp);
        }
        
    },

    start() {
        this.hadleEvents()
    }
};

app.start();