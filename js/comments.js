"use strict"

document.addEventListener('DOMContentLoaded', () => {
    getComments();


    if (usuario != null) {
        document.querySelector('#form-comment').addEventListener('submit', e => {
            e.preventDefault();

            addComment();
        });
        
    }
});


let producto = document.querySelector("#id_producto");
let usuario = document.querySelector("#usuario");


function getComments() {
    fetch('api/comments/'+producto.dataset.id)
        .then(response => response.json())
        .then(comments => render(comments))
        .catch(error => console.log(error));
}

 function render(comments) {
    let container = document.querySelector("#comments-list");
    container.innerHTML = "";

    for (let comment of comments) {
        if ((usuario != null) && (usuario.dataset.admin == 1)) {
            container.innerHTML += `<li class="list-group-item d-flex justify-content-between align-items-center"><span class="text-primary">${comment.email}</span> ${comment.comentario} <button type="button" id="delete-comment" class="btn btn-warning ml-2">Eliminar</button>
                                    <span class="badge badge-primary badge-pill">Calificación: ${comment.puntaje}</span>
                                    </li>`;
            let botonBorrar=document.querySelectorAll("#delete-comment"); 
            for (let j=0;j<botonBorrar.length;j++) {
                let id=comments[j].id_comments;
                botonBorrar[j].addEventListener("click",function(){
                deleteComment(id)
                });
            }
        } else {
            container.innerHTML += `<li class="list-group-item d-flex justify-content-between align-items-center"><span class="text-primary">${comment.email}</span> ${comment.comentario} 
                                    <span class="badge badge-primary badge-pill">Calificación: ${comment.puntaje}</span>
                                    </li>`;
        }
    }
}


function addComment() {

    if (document.querySelector('textarea[name="input_comentario"]').value == ""){

        let mensaje = document.querySelector("#mensaje");

        mensaje.innerHTML = `Por favor ingrese un comentario`

    } else {

        const comment = {
            puntaje: document.querySelector('select[name="input_puntaje"]').value,
            comentario: document.querySelector('textarea[name="input_comentario"]').value,
            id_user: usuario.dataset.id,
            id_producto: producto.dataset.id
        }

        fetch('api/comments', {
            method: 'POST',
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify(comment)
        })
            .then(getComments())
            .then(resetForm())
            .catch(error => console.log(error));


    }
}

function resetForm(){
    document.querySelector("#mensaje").innerHTML = "";
    document.querySelector('textarea[name="input_comentario"]').value = "";
}

function deleteComment(id){
    fetch('api/comments/'+id, {
        method: 'DELETE'
    })
        .then(getComments())
        .catch(error => console.log(error));;
}
