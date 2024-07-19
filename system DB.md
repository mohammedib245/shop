# users
 name , email ,password ,type

 # user address 
  user_id , address, city , country , state , postcode, phone , emaill,surname, deleted_at

# settings
 title , description, address, phone, email, logo , instagram , youtube, x, tiktok

# categories
    name , description, logo, parent

# products
    name , description, image , price , discount , category_id

# productscolor
    product_id , color

# products size 
    product_id , size

# productsColorssize
    color_id, size_id , quantity , pricetwo, discounttwo, status

# product images
    productcolorsize_id , image 

# orders
    user_id, status , payment_method, payment_id , payment_status , total_price , address , 
    phone, email, surname, postcode, country, state, shipping_price

# order Detail
    order_id ,  productcolorsize_id , quntity, price, discount