<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Righteous&display=swap" rel="stylesheet"> 
<meta name="theme-color" content="#6777ef"/>
<link rel="apple-touch-icon" href="{{ asset('logo.png') }}">
<link rel="manifest" href="{{ asset('/manifest.json') }}">
<title>Login</title>
</head>
<style>
 body {
  background: white;
}
#backG {
  position: relative;
  background: url("https://www.movint.es/wp-content/uploads/2020/07/26-ERGONOMIA-CONVENCIONAL-2-scaled-2194x1097.jpg");
  height: 100vh;
  background-size: cover;
  background-position: 0 0;
  background-repeat: repeat-x;
  animation: animate 5s linear infinite;
}
#ufo {
  position: absolute;
  top: 0;
  left: -120px;
  width: auto;
  animation: ufo 2s forwards;
  height: 23%;
}
#ufo2 {
  position: absolute;
  top: 0;
  right: -120px;
  width: auto;
  animation: ufo2 2s forwards;
  height: 23%;
}
txtBox {
  width: auto;
}
#txtW {
  position: absolute;
  left: -22%;
  
  font-size: 150px;
  font-family: 'Righteous', cursive;
  color: #7FFFD4;
  animation: txtW 3s ease forwards;
  width: 100%;
}
#txtE0 {
  position: absolute;
  top: 820px;
  left: 31%;
  font-size: 150px;
  font-family: 'Righteous', cursive;
  animation: txtE0 3s ease-in-out forwards;
  width: 100%;
}
#txtL {
  position: absolute;
  top: -500px;
  left: 38%;
  font-size: 150px;
  font-family: 'Righteous', cursive;
  color: #7FFFD4;
  animation: txtL 3s forwards;
  width: 100%;
}
#txtC {
  position: absolute;
  top: -820px;
  left: 44%;
  font-size: 150px;
  font-family: 'Righteous', cursive;
  animation: txtC 1.5s linear forwards;
 animation-delay: 2s;
  width: 100%;
}
#txtO {
  position: absolute;
  top: 0;
  left: 51%;
  font-size: 150px;
  font-family: 'Righteous', cursive;
  color: rgba(127,255,212,0.0);
  animation: txtO 3s ease-out forwards;
  width: 100%;
}
#txtM {
  position: absolute;
  top: 820px;
  left: 60%;
  font-size: 150px;
  font-family: 'Righteous', cursive;
  animation: txtM 3s forwards;
  width: 100%;
}
#txtE1 {
  position: absolute;
  top: 0;
  left: 150%;
  font-size: 150px;
  font-family: 'Righteous', cursive;
  color: #7FFFD4;
  animation: txtE1 3s forwards;
  
}


@keyframes animate {
  
  from {
   background-position: 0 0;
    
  }
  to {
   background-position: 100% 0;
    
  }
}

@keyframes ufo {
  from {
   left: -120px;
  }
  to {
   left: 150px
  }
}
@keyframes ufo2 {
  from {
   right: -120px;
  }
  to {
   right: 150px
  }
}




@keyframes txtW {
  from {
   left: -22%;
  }
  to {
   left: 22%;
  }
}
@keyframes txtE0 {
  from {
   top: 820px;
  }
  to {
   top: 0;
  }
}
@keyframes txtL {
   from {
   top: -500px;
  }
  to {
   top: 0;
  }
}
@keyframes txtC {
  0% {
   top: -820px;
  }
  90%{
    top: 40px;
  }
  100% {
   top: 0;
  }
}
@keyframes txtO {
  from {
   color: rgba(127,255,212,0.0);
  }
  to {
   color: rgba(127,255,212,1);
  }
}
@keyframes txtM {
  from {
   top: 820px;
  }
  to {
   top: 0;
  }
}
@keyframes txtE1 {
  from {
   left: 150%;
  }
  to {
   left: 69%;
  }
}

@media (max-width: 480px) {
  #txtW,
  #txtE0,
  #txtL,
  #txtC,
  #txtO,
  #txtM,
  #txtE1 {
    font-size: 50px;
  }
  
}  

..btn-1 {
  background: #ff4081;
  background: linear-gradient(0deg, #ff4081 0%,#ff4081 100%);
  border: none;
}
.btn-1:hover {
   background: #f82685;
background: linear-gradient(0deg,#ff4081 0%, #e7227b 100%);
}
    
.btn-login {
  background: #f82685;

  font-size: 0.9rem;
  letter-spacing: 0.05rem;
  padding: 0.75rem 1rem;
}

.btn-google {
  color: white !important;
  background-color: #ea4335;
}

.btn-facebook {
  color: white !important;
  background-color: #3b5998;
}
</style>

<body>
  

  
  <div class="container">
      
   
        <div class="row">
          <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card border-0 shadow rounded-3 my-5">
              <div class="card-body p-4 p-sm-5">
                <h5 class="card-title text-center mb-5 fw-light fs-5">
                  <img width="150" height="50" src="https://th.bing.com/th/id/R.d6ebd8615133da9ab2cb18f584d8449d?rik=aGC1%2bU%2bZXB6knA&riu=http%3a%2f%2ferp.dacesa.com.mx%2fimg%2flogo.png&ehk=Ovu%2fa%2bjmTbZ6Admuzsy7Qv5jlnndW61CxCjaZIWcz5I%3d&risl=&pid=ImgRaw&r=0" alt="">

                </h5>
                
                <form  action="{{ route('login') }}"  method="POST" name="sample">
                    @csrf
                  <div class="form-floating mb-3">
                    <input type="number" required class="form-control" id="floatingInput" name="numero" placeholder="No.Empleado">
                    <label for="floatingInput">No.Empleado</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input type="password" required class="form-control" id="floatingPassword" name="password" placeholder="Contraseña">
                    <label for="floatingPassword">Contraseña</label>
                  </div>
    
                  <div class="d-grid">
                    <button class="btn btn-1 btn-login text-uppercase fw-bold" type="submit">Iniciar Sesion</button>
                  </div>
                  
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
<script>
  <script src="{{ asset('/sw.js') }}"></script>
<script>
    if (!navigator.serviceWorker.controller) {
        navigator.serviceWorker.register("/sw.js").then(function (reg) {
            console.log("Service worker has been registered for scope: " + reg.scope);
        });
    }
</script>
</script>
</html>
