<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    

    <!--bootstrap link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">

    <!--css link-->
    <link rel="stylesheet" href="assets/css/style.css"/>

</head>
<body>

     <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light py-3 fixed-top">
        <div class="container">
          <img id="logo" src="assets/imgs/logo.jpeg"/>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse nav-buttons" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              
                <li class="nav-item">
                     <a class="nav-link active" aria-current="page" href="index.php">Home</a>
               </li>

                <li class="nav-item">
                    <a class="nav-link active" href="shop.php">Shop</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" href="contact.php">Contact Us</a>
                </li>   
                
                <li class="nav-item">
                   <a href="cart.php"><i class="fas fa-shopping-bag"></i></a> 
                   <a href="account.php"> <i class="fas fa-user"></i></a> 
                </li>
              

            </ul>
            
          </div>
        </div>
    </nav>


      <!--Home-->
      <section id="home">
        <div class="container">
          <div id="homeDiv">
            <h3>NEW ARRIVALS</h3>
            <h1><span>Best Prices</span> This Season</h1>
            <h4> Roots offers the best products for the most affordable prices</h4>
            <a href="shop.php"><button >Shop Now</button></a>
          </div>
        </div>
      </section>

      <!--Brand-->
      <section id="brand" class="container">

            <div class="rowroots">
                <div id='roots'>
                    <img src="assets/imgs/ROOTS .png" />
                     <h1 className='home-titles'>What We Do</h1>
                     <p className='home-para'>
                     Unique handcrafted leather goods for your everyday life We're Roots the brand and we make honest, 
                     high quality, functional products to help you dress better. Our products are designed to reflect 
                     our unique perspective and style, making the little things better, and we won't stop until we get
                     it right. We combine incredible craftsmanship, a touch of heart and the finest materials.
                      </p>
                      <a href="shop.php"><button className='product-btn'>Browse Product</button></a>
                </div>

                <div class="styled-text">
                    <p>
                      <span class="drop-cap">M</span>ore and more brands are starting to produce vegan leather accessories to meet the growing demand. But what exactly is it? We help you choose your ethical accessories while avoiding faux pas.
                      </p>
                  </div>    

                  <!--video-->
                  <div width="100%" id="video">
                    <video width="100%" autoPlay loop muted>
                    <source src='assets/imgs/video.mp4' type="video/mp4">
                  </video>
                </div> 

                <div class="history row d-flex justify-content-evenly">
                   
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <img src='assets/imgs/history.jpeg' alt="" />
                    </div>

                     <div class="col-lg-6 col-md-12 col-sm-12" id="leather">   
                        <h1>History of leather</h1>
                        <p >
                        The leather we use in our Products is made of ﬁbre from the waste leaves of the pineapple plant.
                        These leaves are a by-product from existing pineapple harvest,
                        so the raw material requires no additional environmental resources to produce.
                        </p>
                     </div>
                    
                </div>
                                
           </div>     
      </section>

      <!--New-->
      <section id="new" class="w-100">
        <div class="row p-0 m-0">
            <!--One-->
            <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
               <img class="img-fluid" src="assets/imgs/1.jpeg"/>
               <div class="details">
                    <h2>Extreamly Awesome Bags</h2>
                    <a href="shop.php"><button href="shop.php" class="text-uppercase">Show Now</button></a>
               </div>
            </div>
            <!--Two-->
            <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
                <img class="img-fluid" src="assets/imgs/2.jpeg"/>
                <div class="details">
                     <h2>Different Types Of Bags</h2>
                     <a href="shop.php"><button class="text-uppercase">Show Now</button></a>
                </div>
             </div>
            <!--Three-->
            <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
                <img class="img-fluid" src="assets/imgs/3.jpeg"/>
                <div class="details">
                     <h2>100% Pure Style</h2>
                     <a href="shop.php"><button class="text-uppercase">Show Now</button></a>
                </div>
             </div>
        </div>
       </section> 


<!-- Footer -->
 <!-- Le pied de page contient des liens vers des informations supplémentaires et les réseaux sociaux. -->
  <div class="footer-container">
      <div class="footer-links">
    
          <div>
              <ul class="footer-list">
                  <li>Delivery</li>
                  <li>Return Procedure</li>
                  <li>Cookie Policy</li>
              </ul>
          </div>
          
          <div>
              <ul class="footer-list">
                  <li>Our Story</li>
                  <li>History of Leather</li>              
              </ul>
          </div>

          <div>
              <ul class="footer-list">
                  <li>Press</li>
                  <li>FAQ</li>
                  <li>Contact Us</li>
              </ul>
          </div>

      </div>

      <div style="background-color:#5a0e2b5e;color:white;width: 97vw;" class="text-center mt-5">
      <span>Subscribe to receive product updates and our newsletters.</span>
      </div>

            <div class="social-accounts">
        
              <i class="fab fa-pinterest-p"></i>
              <i class="fab fa-tiktok"></i>
              <i class="fab fa-facebook-f"></i>
              <i class="fab fa-instagram"></i>
              <i class="fab fa-youtube"></i>
              
    
      </div>
        <hr><p class="text-center" style="font-size: small;">Roots @ 2023 All Right Reserved</p>

    </div>
   
         

 
<!--script bootstrap-->  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>