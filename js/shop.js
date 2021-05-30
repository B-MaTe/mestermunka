
$(document).ready(function() {
    if ("/aruhaz" == document.location.pathname) {
        var lowerSlider = document.querySelector('#lower');
        var upperSlider = document.querySelector('#upper');

        document.querySelector('#two').value=upperSlider.value;
        document.querySelector('#one').value=lowerSlider.value;

        var lowerVal = parseInt(lowerSlider.value);
        var upperVal = parseInt(upperSlider.value);

        upperSlider.oninput = function () {
            lowerVal = parseInt(lowerSlider.value);
            upperVal = parseInt(upperSlider.value);

            if (upperVal < lowerVal + 4) {
                lowerSlider.value = upperVal - 4;
                if (lowerVal == lowerSlider.min) {
                upperSlider.value = 4;
                }
            }
            document.querySelector('#two').value=this.value
        };

lowerSlider.oninput = function () {
    lowerVal = parseInt(lowerSlider.value);
    upperVal = parseInt(upperSlider.value);
    if (lowerVal > upperVal - 4) {
        upperSlider.value = lowerVal + 4;
        if (upperVal == upperSlider.max) {
            lowerSlider.value = parseInt(upperSlider.max) - 4;
        }
    }
    document.querySelector('#one').value=this.value
}; 


        outerPageCategory();
        filter_data();
        
        document.getElementsByName("price")[0].addEventListener('change', filter_data);
        document.getElementsByName("price")[1].addEventListener('change', filter_data);


        function outerPageCategory() {
            if (typeof localStorage.getItem('category') !== undefined) {
                $("#"+localStorage.getItem('category')).prop("checked", true);
                localStorage.clear();
            }
        }

        
        function filter_data()
        {
            var action = 'fetch_data';
            var minimum_price = $('#lower').val();
            var maximum_price = $('#upper').val();
            var category = get_filter('category');
            var color = get_filter('color');
            var sortby = get_filter('sortby');
            $.ajax({
                url:"../module/fetch_data.php",
                method:"POST",
                data:{action:action, sortby:sortby, minimum_price:minimum_price, maximum_price:maximum_price, category:category, color:color},
                success:function(data){
                    $('.filter_data').html(data);
                },
                failure:function(data){
                    alert(data);
                }
            });
        }

        function get_filter(class_name) {
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
        return filter;

        }
    
        $('.common_selector').click(function(){
            filter_data();
        });
    
        /*
        $('#price_range').slider({
            range:true,
            min:1000,
            max:65000,
            values:[1000, 65000],
            step:500,
            stop:function(event, ui)
            {
                $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
                $('#hidden_minimum_price').val(ui.values[0]);
                $('#hidden_maximum_price').val(ui.values[1]);
                filter_data();
            }
        });
        */
        
    }  


    
});
