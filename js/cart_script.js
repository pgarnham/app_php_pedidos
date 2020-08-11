var check = false;

const formatter = new Intl.NumberFormat('en-US', {
    style: 'currency',
    currency: 'USD',
    minimumFractionDigits: 0
  })

function changeVal(el) {
  var qt = parseFloat(el.parent().children(".qt").html());
  var price = parseFloat(el.parent().children(".price").html());
  var eq = Math.round(price * qt * 100) / 100;
  
  el.parent().children(".full-price").html(formatter.format(eq));
  
  changeTotal();            
}

function changeTotal() {
  
  var price = 0;
  
  $(".full-price").each(function(index){
    price += parseInt($(".full-price").eq(index).html().replace(/[$,]+/g,""));
  });
  
  /* price = Math.round(price * 100) / 100; */
  /* var tax = Math.round(price * 0.05 * 100) / 100;
  var shipping = parseFloat($(".shipping span").html()); */
  /* var fullPrice = Math.round((price + tax + shipping) *100) / 100; */
  var fullPrice = price;
  
  if(price == 0) {
    fullPrice = 0;
  }
  
  $(".subtotal span").html(formatter.format(price));
  /* $(".tax span").html(tax); */
  $(".total span").html(formatter.format(fullPrice));
}

$(document).ready(function(){
  
  $(".remove").click(function(){
    var el = $(this);
    el.parent().parent().addClass("removed");
    window.setTimeout(
      function(){
        el.parent().parent().slideUp('fast', function() { 
          el.parent().parent().remove(); 
          if($(".product").length == 0) {
            if(check) {
              $("#cart").html("<h1>The shop does not function, yet!</h1><p>If you liked my shopping cart, please take a second and heart this Pen on <a href='https://codepen.io/ziga-miklic/pen/xhpob'>CodePen</a>. Thank you!</p>");
            } else {
              $("#cart").html("<h1>No products!</h1>");
            }
          }
          changeTotal(); 
        });
      }, 200);
  });
  
  $(".qt-plus").click(function(){
    id = $(this).parent().attr('id');
    console.log(id);
    actual_pid = id.slice(7);
    console.log(actual_pid);
    actual_step = dict_steps[actual_pid];
    console.log(actual_step);
    $(this).parent().children(".qt").html(parseFloat($(this).parent().children(".qt").html()) + actual_step);
    
    $(this).parent().children(".full-price").addClass("added");
    
    var el = $(this);
    window.setTimeout(function(){el.parent().children(".full-price").removeClass("added"); changeVal(el);}, 150);
  });
  
  $(".qt-minus").click(function(){
    
    child = $(this).parent().children(".qt");
    id = $(this).parent().attr('id');
    actual_pid = id.slice(7);
    actual_step = parseFloat(dict_steps[actual_pid]);
    
    if(parseFloat(child.html()) > 0) {
      child.html(parseFloat(child.html()) - actual_step);
    }
    
    $(this).parent().children(".full-price").addClass("minused");
    
    var el = $(this);
    window.setTimeout(function(){el.parent().children(".full-price").removeClass("minused"); changeVal(el);}, 150);
  });
  
  window.setTimeout(function(){$(".is-open").removeClass("is-open")}, 1200);
  
  $(".btn").click(function(){
    check = true;
    $(".remove").click();
  });
});

$(document).ready(function () {
    $('#select-anchor').change( function (e) {
        if (e.originalEvent){
            var targetPosition = $($(this).val()).offset().top;
            $('html,body').animate({ scrollTop: targetPosition}, 'slow');
        }
        
    });
});


 $(window).scroll(function() {

    for (let categoria of js_categorias){
        var common_str = "#cat";
        var id_categoria = common_str.concat(categoria);
        var hT = $(id_categoria).offset().top,
        hH = $(id_categoria).outerHeight(),
        wH = $(window).height(),
        wS = $(this).scrollTop();
        if (wS > (hT+hH-wH)){
            $('#select-anchor').val(id_categoria);
        }
    }
    
 });