<style>
.c-container {
    margin: auto;
    width: 100%;
    position: relative;
    /* z-index: 1; */
}


.card-view {
    -webkit-box-shadow: 0 3px 10px 0 rgba(0, 0, 0, 0.05);
    box-shadow: 0 3px 10px 0 rgba(0, 0, 0, 0.05);
    border-radius: 4px;
    padding: 22px;
    margin-bottom: 20px;
    background: #fff;
}

.flex-row {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    margin-right: -15px;
    margin-left: -15px;
}

.spacer {
    padding-top: 50px;
    padding-bottom: 50px;
}

.bg-gray {
    background: #F8F8F8;
}

.no-margin {
    margin: 0 !important;
}

.flex-row .flex-col {
    -ms-flex-preferred-size: 0;
    flex-basis: 0;
    -webkit-box-flex: 1;
    -ms-flex-positive: 1;
    flex-grow: 1;
    max-width: 100%;
    position: relative;
    width: 100%;
    min-height: 1px;
    padding-right: 15px;
    padding-left: 15px;
}

/* common css up */
.timeline {
    list-style: none;
    padding: 0;
    margin: 0;
    position: relative;
}

.timeline li.right {
    margin-left: auto;
}

.timeline li:first-child {
    margin-top: 0;
}

.timeline li {
    width: 47%;
    position: relative;
    margin-top: 50px;
}

.timeline:before {
    content: '';
    width: 4px;
    height: 100%;
    background: #E4E4E4;
    display: block;
    position: absolute;
    left: 0;
    right: 0;
    margin: auto;
}

.timeline li:before {
    content: '';
    --size: 16px;
    width: var(--size);
    height: var(--size);
    background: #00796B;
    display: block;
    position: absolute;
    left: -48px;
    border-radius: 50%;
}

.time-thumb-row {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    margin-bottom: 20px;
}

.time-thumb-row .time-content {
    margin-left: 14px;
}

.time-thumb-row .time-content h4 {
    margin: 0;
    color: #212121;
    font-weight: 600;
    font-size: 17px;
}

.time-thumb-row .time-content time {
    font-size: 14px;
    color: #666666;
}

.timeline li.left:before {
    left: inherit;
    right: -48px;
}

.width100 {
    width: 100%;
    max-height: 500px;
    object-fit: cover;
    object-position: center;
}


.fade-in[data-scroll] {
    opacity: 0;
    will-change: transform, scale, opacity;
    -webkit-transform: translateY(6rem) scale(0.93);
    transform: translateY(6rem) scale(0.93);
    transition: all 1.5s cubic-bezier(0.165, 0.84, 0.44, 1);
}

.fade-in-right[data-scroll] {
    opacity: 0;
    will-change: transform, scale, opacity;
    -webkit-transform: translatex(6rem) scale(0.93);
    transform: translatex(6rem) scale(0.93);
    transition: all 1.5s cubic-bezier(0.165, 0.84, 0.44, 1);
}

.fade-in-left[data-scroll] {
    opacity: 0;
    will-change: transform, scale, opacity;
    -webkit-transform: translatex(-6rem) scale(0.93);
    transform: translatex(-6rem) scale(0.93);
    transition: all 1.5s cubic-bezier(0.165, 0.84, 0.44, 1);
}

.fade-in[data-scroll="in"],
.fade-in-right[data-scroll="in"],
.fade-in-left[data-scroll="in"] {
    opacity: 1;
    -webkit-transform: translateY(0) scale(1);
    transform: translateY(0) scale(1);
}

.video-fluid {
    width: 100%;
    height: auto;
}
</style>


<h3>Timeline</h3>
<section class="c-container" style="position: static;">

    <div class="">
        @foreach($modele->photos as $photo)
        <div class="card-view fade-in " data-scroll>
            <div class="time-thumb-row ">
                <div class="time-thumb">
                    <img src="{{ asset($modele->poster) }}" class="rounded-circle" style="width:50px; height:50px;"
                        alt="">
                </div>
                <div class="time-content">
                    <h4>{{ $modele->stage_name }}</h4>
                    <time>{{ $photo->created_at->diffForHumans() }}</time>
                </div>
            </div>
            @if($photo->type === 'photo')
            <img class="width100" src="{{asset($photo->uri)}}" alt="">
            @else
            <video class="video-fluid z-depth-1" autoplay loop controls muted>
                <source src="{{asset($photo->uri)}}" type="video/mp4" />
            </video>
            @endif
        </div>
        @endforeach
    </div>

</section>

<script src="https://md-aqil.github.io/images/scroll-out.js"></script>

<script>
ScrollOut({
    cssProps: {
        visibleY: true,
        viewportY: true
    },
});
</script>