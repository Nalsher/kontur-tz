import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

function clearInputs() {
    document.getElementById("name").value = "";
    document.getElementById("email").value = "";
    document.getElementById("phone").value = "";
}

document.addEventListener('DOMContentLoaded', () => {
    const btn = document.getElementById("createButton");
    if (!btn) return;

    btn.addEventListener("click", () => {
        let name = document.getElementById("name").value;
        let email = document.getElementById("email").value;
        let phone = document.getElementById("phone").value;

        window.axios.post("/", { name, email, phone })
            .then(res => {
                alert("successfully created");
                clearInputs();
            })
            .catch(err => {
                alert("Error");
                console.error(err);
            });
    });
});
