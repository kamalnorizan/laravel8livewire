<div>
    <div class="mt-3 row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <img class="card-img-top" src="holder.js/100x180/" alt="">
                <div class="card-body">
                    <h4 class="card-title">{{ $post->title }} <small>~{{ $post->user->name }}</small></h4>
                    <p class="card-text">{{ $post->description }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
