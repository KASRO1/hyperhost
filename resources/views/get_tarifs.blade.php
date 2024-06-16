@foreach($items as $item)
@php
$country = DB::table('data_centers')->find($item->country);
@endphp
                    <div class="tarif">
                        <p class="title">
                            {{ __("$item->name")}}
                            <img src="{{$country->img}}" alt="">
                        </p>
                        <div class="infos">
                            <div class="item">
                                <div class="icon">
                                    <img src="/img/icons/cpu_icon.svg" alt="">
                                </div>
                                <div>
                                    <p class="ititle">{!! __("Processor.title") !!}</p>
                                    <p class="text">{{ __($item->proc)}}</p>
                                </div>
                            </div>
                            <div class="item">
                                <div class="icon">
                                    <img src="/img/icons/ram_icon.svg" alt="">
                                </div>
                                <div>
                                    <p class="ititle">{!! __("Operational.title") !!}</p>
                                    <p class="text">{{$item->opera}}</p>
                                </div>
                            </div>
                            <div class="item">
                                <div class="icon">
                                    <img src="/img/icons/disk_icon.svg" alt="">
                                </div>
                                <div>
                                    <p class="ititle">{!! __("Disk.title") !!}</p>
                                    <p class="text">{{$item->disk}}</p>
                                </div>
                            </div>
                            <div class="item">
                                <div class="icon">
                                    <img src="/img/icons/lan_icon.svg" alt="">
                                </div>
                                <div>
                                    <p class="ititle">{!! __("Port.title") !!}</p>
                                    <p class="text">{{$item->port}}</p>
                                </div>
                            </div>
                            <div class="item">
                                <div class="icon">
                                    <img src="/img/icons/ip_icon.svg" alt="">
                                </div>
                                <div>
                                    <p class="ititle">{!! __("IP-address.title") !!}</p>
                                    <p class="text">{{$item->ip}}</p>
                                </div>
                            </div>
                            <div class="item">
                                <div class="icon">
                                    <img src="/img/icons/service_icon.svg" alt="">
                                </div>
                                <div>
                                    <p class="ititle">{!! __("Virtualization.title") !!}</p>
                                    <p class="text">{{$item->virt}}</p>
                                </div>
                            </div>
                            <div class="item">
                                <div class="icon">
                                    <img src="/img/icons/traffic_icon.svg" alt="">
                                </div>
                                <div>
                                    <p class="ititle">{!! __("Traffic.title") !!}</p>
                                    <p class="text">{{ __($item->traf)}}</p>
                                </div>
                            </div>
                            <div class="item">
                                <div class="icon">
                                    <img src="/img/icons/window_icon.svg" alt="">
                                </div>
                                <div>
                                    <p class="ititle">{!! __("Operating-systems.title") !!}</p>
                                    <p class="text">{{$item->os}}</p>
                                </div>
                            </div>
                            <div class="item">
                                <div class="icon">
                                    <img src="/img/icons/panel_icon.svg" alt="">
                                </div>
                                <div>
                                    <p class="ititle">{!! __("Control-panels.title") !!}</p>
                                    <p class="text">{{$item->panel}}</p>
                                </div>
                            </div>
                        </div>
                        <p class="price">
                        {{$item->price}} <br>
                            <span>{!! __("month.title") !!}</span>
                        </p>
                        <a href="{{$item->link}}" class="btn">{{ __("Order-server.title")}}</a>
                    </div>
@endforeach

@if(count($items) == 0)
                    <div class="tarif" style="opacity: 0.5; filter: blur(1px); pointer-events: none">
                        <p class="title">
                            -
                        </p>
                        <div class="infos">
                            <div class="item">
                                <div class="icon">
                                    <img src="/img/icons/cpu_icon.svg" alt="">
                                </div>
                                <div>
                                    <p class="ititle">{!! __("Processor.title") !!}</p>
                                    <p class="text">-</p>
                                </div>
                            </div>
                            <div class="item">
                                <div class="icon">
                                    <img src="/img/icons/ram_icon.svg" alt="">
                                </div>
                                <div>
                                    <p class="ititle">{!! __("Operational.title") !!}</p>
                                    <p class="text">-</p>
                                </div>
                            </div>
                            <div class="item">
                                <div class="icon">
                                    <img src="/img/icons/disk_icon.svg" alt="">
                                </div>
                                <div>
                                    <p class="ititle">{!! __("Disk.title") !!}</p>
                                    <p class="text">-</p>
                                </div>
                            </div>
                            <div class="item">
                                <div class="icon">
                                    <img src="/img/icons/lan_icon.svg" alt="">
                                </div>
                                <div>
                                    <p class="ititle">{!! __("Port.title") !!}</p>
                                    <p class="text">-</p>
                                </div>
                            </div>
                            <div class="item">
                                <div class="icon">
                                    <img src="/img/icons/ip_icon.svg" alt="">
                                </div>
                                <div>
                                    <p class="ititle">{!! __("IP-address.title") !!}</p>
                                    <p class="text">-</p>
                                </div>
                            </div>
                            <div class="item">
                                <div class="icon">
                                    <img src="/img/icons/service_icon.svg" alt="">
                                </div>
                                <div>
                                    <p class="ititle">{!! __("Virtualization.title") !!}</p>
                                    <p class="text">-</p>
                                </div>
                            </div>
                            <div class="item">
                                <div class="icon">
                                    <img src="/img/icons/traffic_icon.svg" alt="">
                                </div>
                                <div>
                                    <p class="ititle">{!! __("Traffic.title") !!}</p>
                                    <p class="text">-</p>
                                </div>
                            </div>
                            <div class="item">
                                <div class="icon">
                                    <img src="/img/icons/window_icon.svg" alt="">
                                </div>
                                <div>
                                    <p class="ititle">{!! __("Operating-systems.title") !!}</p>
                                    <p class="text">-</p>
                                </div>
                            </div>
                            <div class="item">
                                <div class="icon">
                                    <img src="/img/icons/panel_icon.svg" alt="">
                                </div>
                                <div>
                                    <p class="ititle">{!! __("Control-panels.title") !!}</p>
                                    <p class="text">-</p>
                                </div>
                            </div>
                        </div>
                        <p class="price">
                        - <br>
                            <span>month</span>
                        </p> 
                    </div>
                    <div class="tarif" style="opacity: 0.5; filter: blur(1px); pointer-events: none">
                        <p class="title">
                            -
                        </p>
                        <div class="infos">
                            <div class="item">
                                <div class="icon">
                                    <img src="/img/icons/cpu_icon.svg" alt="">
                                </div>
                                <div>
                                    <p class="ititle">{!! __("Processor.title") !!}</p>
                                    <p class="text">-</p>
                                </div>
                            </div>
                            <div class="item">
                                <div class="icon">
                                    <img src="/img/icons/ram_icon.svg" alt="">
                                </div>
                                <div>
                                    <p class="ititle">{!! __("Operational.title") !!}</p>
                                    <p class="text">-</p>
                                </div>
                            </div>
                            <div class="item">
                                <div class="icon">
                                    <img src="/img/icons/disk_icon.svg" alt="">
                                </div>
                                <div>
                                    <p class="ititle">{!! __("Disk.title") !!}</p>
                                    <p class="text">-</p>
                                </div>
                            </div>
                            <div class="item">
                                <div class="icon">
                                    <img src="/img/icons/lan_icon.svg" alt="">
                                </div>
                                <div>
                                    <p class="ititle">{!! __("Port.title") !!}</p>
                                    <p class="text">-</p>
                                </div>
                            </div>
                            <div class="item">
                                <div class="icon">
                                    <img src="/img/icons/ip_icon.svg" alt="">
                                </div>
                                <div>
                                    <p class="ititle">{!! __("IP-address.title") !!}</p>
                                    <p class="text">-</p>
                                </div>
                            </div>
                            <div class="item">
                                <div class="icon">
                                    <img src="/img/icons/service_icon.svg" alt="">
                                </div>
                                <div>
                                    <p class="ititle">{!! __("Virtualization.title") !!}</p>
                                    <p class="text">-</p>
                                </div>
                            </div>
                            <div class="item">
                                <div class="icon">
                                    <img src="/img/icons/traffic_icon.svg" alt="">
                                </div>
                                <div>
                                    <p class="ititle">{!! __("Traffic.title") !!}</p>
                                    <p class="text">-</p>
                                </div>
                            </div>
                            <div class="item">
                                <div class="icon">
                                    <img src="/img/icons/window_icon.svg" alt="">
                                </div>
                                <div>
                                    <p class="ititle">{!! __("Operating-systems.title") !!}</p>
                                    <p class="text">-</p>
                                </div>
                            </div>
                            <div class="item">
                                <div class="icon">
                                    <img src="/img/icons/panel_icon.svg" alt="">
                                </div>
                                <div>
                                    <p class="ititle">{!! __("Control-panels.title") !!}</p>
                                    <p class="text">-</p>
                                </div>
                            </div>
                        </div>
                        <p class="price">
                        - <br>
                            <span>в месяц</span>
                        </p> 
                    </div>
                    <div class="tarif" style="opacity: 0.5; filter: blur(1px); pointer-events: none">
                        <p class="title">
                            -
                        </p>
                        <div class="infos">
                            <div class="item">
                                <div class="icon">
                                    <img src="/img/icons/cpu_icon.svg" alt="">
                                </div>
                                <div>
                                    <p class="ititle">{!! __("Processor.title") !!}</p>
                                    <p class="text">-</p>
                                </div>
                            </div>
                            <div class="item">
                                <div class="icon">
                                    <img src="/img/icons/ram_icon.svg" alt="">
                                </div>
                                <div>
                                    <p class="ititle">{!! __("Operational.title") !!}</p>
                                    <p class="text">-</p>
                                </div>
                            </div>
                            <div class="item">
                                <div class="icon">
                                    <img src="/img/icons/disk_icon.svg" alt="">
                                </div>
                                <div>
                                    <p class="ititle">{!! __("Disk.title") !!}</p>
                                    <p class="text">-</p>
                                </div>
                            </div>
                            <div class="item">
                                <div class="icon">
                                    <img src="/img/icons/lan_icon.svg" alt="">
                                </div>
                                <div>
                                    <p class="ititle">{!! __("port.title") !!}</p>
                                    <p class="text">-</p>
                                </div>
                            </div>
                            <div class="item">
                                <div class="icon">
                                    <img src="/img/icons/ip_icon.svg" alt="">
                                </div>
                                <div>
                                    <p class="ititle">{!! __("IP-address.title") !!}</p>
                                    <p class="text">-</p>
                                </div>
                            </div>
                            <div class="item">
                                <div class="icon">
                                    <img src="/img/icons/service_icon.svg" alt="">
                                </div>
                                <div>
                                    <p class="ititle">{!! __("Virtualization.title") !!}</p>
                                    <p class="text">-</p>
                                </div>
                            </div>
                            <div class="item">
                                <div class="icon">
                                    <img src="/img/icons/traffic_icon.svg" alt="">
                                </div>
                                <div>
                                    <p class="ititle">{!! __("Traffic.title") !!}</p>
                                    <p class="text">-</p>
                                </div>
                            </div>
                            <div class="item">
                                <div class="icon">
                                    <img src="/img/icons/window_icon.svg" alt="">
                                </div>
                                <div>
                                    <p class="ititle">{!! __("Operating-systems.title") !!}</p>
                                    <p class="text">-</p>
                                </div>
                            </div>
                            <div class="item">
                                <div class="icon">
                                    <img src="/img/icons/panel_icon.svg" alt="">
                                </div>
                                <div>
                                    <p class="ititle">{!! __("Control-panels.title") !!}</p>
                                    <p class="text">-</p>
                                </div>
                            </div>
                        </div>
                        <p class="price">
                        - <br>
                            <span>{!! __("month.title") !!}</span>
                        </p> 
                    </div>
@endif