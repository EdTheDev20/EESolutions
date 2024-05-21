    <!-- Page start -->
    <section class="container-fluid">
      <div class="row">
        <div class="col-8 mt-0 ps-0">
          <img src="/eesolutions/assets/images/loginout.jpeg" alt="" />
        </div>
        <div class="col-4 ps-5 align-self-center">
          <div class="border-bottom">
            <h5 class="text-center">Inicie a sua sessão</h5>
          </div>
          <form class="mt-3" method="POST" action="/eesolutions/login">
            <div class="form-group">
              <label for="email">Endereço de email</label>
              <input
                type="email"
                class="form-control"
                id="email"
                name="email"
                aria-describedby="emailHelp"
                placeholder="Introduza o seu email"
              />
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input
                type="password"
                placeholder="Password"
                id="password"
                name="password"
                class="form-control"
              />
            </div>
            <div>
              <button type="submit" class="btn btn-primary mt-3 mb-3">
                Login
              </button>
              
            </div>
            <div><p>Não possui uma conta? <a href="/eesolutions/register">Registre-se já</a></p></div>
          </form>
        </div>
      </div>
    </section>