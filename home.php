<style>
	.portial-icon {
	    font-size: 5rem;
	    height: 8.5rem;
	    width: 8.5rem;
	    align-items: center;
	    justify-content: center;
	    display: flex;
	    border: 4px solid #fffafadb;
	    color: #ffffffb8;
	}
	.portal-link{
		color:unset;
	}
	.portal-link:hover{
		color:unset;
	}
	.widget-user .widget-user-image {
		position: absolute;
		top: 50px;
		display: flex;
		justify-content: center;
		align-items: center;
		width: 100%;
		margin: unset;
		left: unset;
	}
	.portal-link .card:hover {
	    color: unset;
	    position: relative;
	    top: -3px;
	    box-shadow: 0 9px #0201010d;
	}
</style>
<style>
    #main-header{
        height:50vh;
    }
</style>
<section class="py-4">
    <div class="container">
        <div class="card card-outline card-primary rounded-0 shadow">
            <div class="card-body">
                <?= file_get_contents('home.html') ?>
            </div>
        </div>
    </div>
    
</section>
<script>
    $(function(){
        $('#search-frm').submit(function(e){
            e.preventDefault();
            location.href = "./?"+$(this).serialize()
        })
    })

</script>
