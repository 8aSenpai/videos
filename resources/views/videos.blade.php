@extends('general.preset')
@section('title')
@foreach($videos as $video) 
{{ $video->name }}
@endforeach
@endsection
@section('content')
<div class="container">
    <div class="row">
        @foreach($videos as $video) 
		<div class="col-xs-12" style="text-align: center;"> 
		 	<section style="display: none;">
	            <h3>Global Options</h3>
	            <form action="#" method="get">
	                <label>Language <select name="lang">
	                    <option value="cs">Čeština / Czech (cs)</option>
	                    <option value="de">Deutsch / German (de)</option>
	                    <option value="en" selected>English (en)</option>
	                    <option value="es">Español / Spanish; Castilian (es)</option>
	                    <option value="fa">فارسی / Persian (fa)</option>
	                    <option value="fr">Français / French (fr)</option>
	                    <option value="hr">Hrvatski / Croatian (hr)</option>
	                    <option value="hu">Magyar / Hungarian (hu)</option>
	                    <option value="it">Italiano / Italian (it)</option>
	                    <option value="ja">日本語 / Japanese (ja)</option>
	                    <option value="ko">한국어 / Korean (ko)</option>
	                    <option value="nl">Nederlands / Dutch (nl)</option>
	                    <option value="pl">Polski / Polish (pl)</option>
	                    <option value="pt">Português / Portuguese (pt)</option>
	                    <option value="pt-BR">Português / Portuguese (BR) (pt-BR)</option>
	                    <option value="ro">Română / Romanian (ro)</option>
	                    <option value="ru">Русский / Russian (ru)</option>
	                    <option value="sk">Slovensko / Slovak (sk)</option>
	                    <option value="sv">Svenska / Swedish (sv)</option>
	                    <option value="uk">Українська / Ukrainian (uk)</option>
	                    <option value="zh-CN">简体中文 / Simplified Chinese (zh-CN)</option>
	                    <option value="zh">繁体中文 / Traditional Chinese (zh-TW)</option>
	                </select>
	                </label>
	                <label>Stretching (Video Only)<select name="stretching">
	                    <option value="auto" selected>Auto (default)</option>
	                    <option value="responsive">Responsive</option>
	                    <option value="fill" selected>Fill</option>
	                    <option value="none" selected>None (original dimensions)</option>
	                </select>
	                </label>
	            </form>
        	</section> 
        <div class="players" id="player1-container"> 
			<h1>{{ $video->name }}</h1> 
<!-- asdasd -->
            <div class="media-wrapper">
                <video id="player1" width="854" height="480" style="margin: 0;" preload="none" controls playsinline webkit-playsinline>
                    <source src="/uploads/videos/{{ $video->file }}">
                    <track srclang="en" kind="subtitles" src="mediaelement.vtt">
                    <track srclang="en" kind="chapters" src="chapters.vtt">
                </video>
            </div>
        </div>
        </div>
        @endforeach
    </div>
</div>
	
@endsection
@section('scripts')
	<script src="{{ asset('videoplayer/build/mediaelement-and-player.js') }}"></script>
    <script src="{{ asset('videoplayer/build/renderers/dailymotion.js') }}"></script>
    <script src="{{ asset('videoplayer/build/renderers/facebook.js') }}"></script>
    <script src="{{ asset('videoplayer/build/renderers/soundcloud.js') }}"></script>
    <script src="{{ asset('videoplayer/build/renderers/twitch.js') }}"></script>
    <script src="{{ asset('videoplayer/build/renderers/vimeo.js') }}"></script>
    <script src="{{ asset('videoplayer/build/lang/cs.js') }}"></script>
    <script src="{{ asset('videoplayer/build/lang/de.js') }}"></script>
    <script src="{{ asset('videoplayer/build/lang/es.js') }}"></script>
    <script src="{{ asset('videoplayer/build/lang/fa.js') }}"></script>
    <script src="{{ asset('videoplayer/build/lang/fr.js') }}"></script>
    <script src="{{ asset('videoplayer/build/lang/hr.js') }}"></script>
    <script src="{{ asset('videoplayer/build/lang/hu.js') }}"></script>
    <script src="{{ asset('videoplayer/build/lang/it.js') }}"></script>
    <script src="{{ asset('videoplayer/build/lang/ja.js') }}"></script>
    <script src="{{ asset('videoplayer/build/lang/ko.js') }}"></script>
    <script src="{{ asset('videoplayer/build/lang/nl.js') }}"></script>
    <script src="{{ asset('videoplayer/build/lang/pl.js') }}"></script>
    <script src="{{ asset('videoplayer/build/lang/pt.js') }}"></script>
    <script src="{{ asset('videoplayer/build/lang/pt-br.js') }}"></script>
    <script src="{{ asset('videoplayer/build/lang/ro.js') }}"></script>
    <script src="{{ asset('videoplayer/build/lang/ru.js') }}"></script>
    <script src="{{ asset('videoplayer/build/lang/sk.js') }}"></script>
    <script src="{{ asset('videoplayer/build/lang/sv.js') }}"></script>
    <script src="{{ asset('videoplayer/build/lang/uk.js') }}"></script>
    <script src="{{ asset('videoplayer/build/lang/zh-cn.js') }}"></script>
    <script src="{{ asset('videoplayer/build/lang/zh.js') }}"></script>
    <script src="{{ asset('videoplayer/presets.js') }}"></script>
@endsection