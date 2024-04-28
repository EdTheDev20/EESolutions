window.addEventListener('load',function(){
this.fetch("/javascript/db.json").then((response)=> response.json()).then((data)=>{
    const cardDiv = document.getElementById('cardReceiver');

    data.outdoors.forEach((outdoor)=>{
        const card = document.createElement('div');
        card.classList.add('col');
        card.classList.add('mb-5');
        card.innerHTML= ` <div class="card h-100">
        <!--Image-->
        <img
          src="${outdoor.path}"
          alt=""
          
          class="card-img-top"
        />
        <!--Details-->
        <div class="card-body p-4">
          <div class="text-center">
            <!--Name of the product-->
            <h5 class="fw-bolder">${outdoor.titulo}</h5>
            <!--Price-->
            <p class="priceText">${outdoor.price}<p class="priceText fw-semibold">Kz</p></p>
          </div>
        </div>
        <!--Actions(example: Buy)-->
        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
          <div class="text-center">
            <a class="btn btn-outline-dark mt-auto" href="#"
              >Ver opções</a
            >
          </div>
        </div>
      </div>`

      cardDiv.appendChild(card)
    });
});
});
