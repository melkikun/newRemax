    <div class="navigation" id="navigation">
        <header class="navbar" id="top" style="">
            <div class="container">
                <div class="navbar-brand nav">
                    <a class="navbar-brand nav logo" href="{{ url('/') }}" title="" rel="home">
                        <object class="master-logo" type="" style="background: url('{{ asset('/') }}images/124.png'); background-size: cover; height: 70px; margin-top: -10px;"></object>
                    </a>
                    <a class="navbar-brand nav logo retina" href="{{ url('/') }}" title="" rel="home">
                        <object class="master-logo" type="" style="background: url('{{ asset('/') }}images/124.png'); background-size: cover; height: 70px; margin-top: -10px;"></object>
                    </a>
                </div>
                <nav class="primary start main-menu">
                    <ul class="nav navbar-nav pull-right">
                        @foreach($header->data as $data)
                        <li class="{{ Request::is($data->wbmnAPI) ? 'active' : '' }}">
                            <a href="{{ url($data->wbmnAPI) }}">{{ $data->wbmlName }}</a>
                        </li>
                        @endforeach
                        <li>
                            <a href="https://www.remax.co.id/admin/">
                                <i class="fa fa-lock" style="font-size:10px;"></i>
                            </a>
                        </li>
                        @foreach($language->data as $lg)
                        <li>
                            <a style="padding-left: 5px;padding-right: 5px;" href="?language={{$lg->langCode }}">
                                @foreach($language->linked->langFileId as $linked)
                                @if($lg->links->langFileId == $linked->id)
                                <img style="width: 30px; height: 15px;" src="{{ 'https://www.remax.co.id/prodigy/papi/'.$linked->filePreview.'?size=30,32' }}" alt="">
                                @endif
                                @endforeach
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </nav>
            </div>
            <div class="site-header">
                <a href="#" data-toggle="dropdown" class="pull-right drop-left">Menu
                    <div class="gamb-button">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </div>
                </a>
                <div class="navbar-brand nav">
                    <a class="navbar-brand nav logo" href="{{ url('/') }}" title="" rel="home">
                       <object class="master-logo" type="" style="background: url('{{ asset('/') }}images/124.png'); background-size: cover; height: 70px; margin-top: -10px;"></object>
                    </a>
                    <a class="navbar-brand nav logo retina" href="{{ url('/') }}" title="" rel="home">
                       <object class="master-logo" type="" style="background: url('{{ asset('/') }}images/124.png'); background-size: cover; height: 70px; margin-top: -10px;"></object>
                    </a>
                </div>
                <div class="mob-menu drop-close hidden">
                    <a href="#" data-toggle="dropdown" class="pull-right drop-close hidden black-cross">Close
                        <span class="cross"></span>
                    </a>
                    <nav class="secondary">
                        <ul class="nav navbar-nav">

                            @foreach($header->data as $key => $data)
                            <li class="{{ Request::is($data->wbmnAPI) ? 'active' : '' }}">
                                <a href="{{ url($data->wbmnAPI) }}">{{ $data->wbmlName }}</a>
                            </li>
                            @endforeach
                            <li>
                                <a href="https://www.remax.co.id/admin/">
                                    <i class="fa fa-lock" style="font-size:10px;"></i>
                                </a>
                            </li>
                            @foreach($language->data as $lg)
                            <li>
                                <a style="padding: auto;" href="?language={{$lg->langCode }}">
                                    @foreach($language->linked->langFileId as $linked)
                                    @if($lg->links->langFileId == $linked->id)
                                    <img src="{{ 'https://www.remax.co.id/prodigy/papi/'.$linked->filePreview.'?size=30,30' }}" alt="">
                                    @endif
                                    @endforeach
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </nav><!-- /.navbar collapse-->
                </div>
            </div>
        </header><!-- /.navbar -->
    </div>
