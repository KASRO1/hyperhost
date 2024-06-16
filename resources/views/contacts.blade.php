@extends('content')
@section('title', 'Свяжитесь с нами – Контакты Hyper.Hosting для поддержки и консультаций')

@section('description', 'Наши контактные данные для связи и поддержки. Hyper.Hosting всегда готов помочь вам.')
@section('content')

<main class="other_page">

                <div class="container">
                    <h1><span>{!! __("OUR.title") !!}</span> {!! __("Contacts.title") !!}</h1>
                </div>
            </main>
<div class="breadcrumbs container  m-auto">
    {{Breadcrumbs::render() }}
</div>
        
 


            <div class="container other_page contacts">
                  <div class="left">
                    <p class="title">{!! __("Feedback.title") !!}</p>
                    <div class="form">
                        <input type="text" placeholder="{!! __('What is your name?.title') !!}" id="name">
                        <input type="text" placeholder="{!! __('Your e-mail address.title') !!}" id="email">
                        <input type="text" placeholder="{!! __('Phone number.title') !!}" id="tel">
                        <textarea placeholder="{!! __('Describe your problem.title') !!}" id="text"></textarea>
                        <p id="err" style="text-align: center"></p>
                        <button id="send">{!! __("Send.title") !!}</button>
                    </div>
                  </div>
                  <div class="right">
                    <p class="ftext">Hyper.Hosting<br>
                       Internet Provider</p>
                        <div class="item">
                            <div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                    <path d="M10 0C6.48574 0 3.55469 2.83086 3.55469 6.44531C3.55469 7.82039 3.96789 9.04656 4.7609 10.1955L9.50676 17.601C9.73699 17.961 10.2635 17.9603 10.4932 17.601L15.2597 10.1704C16.0356 9.07344 16.4453 7.78543 16.4453 6.44531C16.4453 2.89137 13.5539 0 10 0ZM10 9.375C8.38465 9.375 7.07031 8.06066 7.07031 6.44531C7.07031 4.82996 8.38465 3.51562 10 3.51562C11.6154 3.51562 12.9297 4.82996 12.9297 6.44531C12.9297 8.06066 11.6154 9.375 10 9.375Z" fill="white"/>
                                    <path d="M14.5806 13.4646L11.6302 18.0774C10.8665 19.2681 9.12926 19.2642 8.36922 18.0785L5.41398 13.4658C2.81383 14.067 1.21094 15.1683 1.21094 16.4843C1.21094 18.768 5.73938 20 10 20C14.2606 20 18.7891 18.768 18.7891 16.4843C18.7891 15.1673 17.1839 14.0655 14.5806 13.4646Z" fill="white"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text"> 
                                    <span>{!! __("Legal address.title") !!}</span> <br>
                                    123100, Москва, Пресненская набережная, дом 12 Башня Федерация
                                </p>
                            </div>
                        </div> 
                        <div class="items">
                            <div class="item">
                                <div class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                        <g clip-path="url(#clip0_1_1974)">
                                          <path d="M8.28167 11.7183C6.37271 9.80934 5.94167 7.90037 5.84443 7.13554C5.81726 6.92407 5.89004 6.71198 6.04133 6.56175L7.58616 5.01761C7.8134 4.7905 7.85373 4.43657 7.6834 4.16416L5.22374 0.344852C5.0353 0.0432134 4.64838 -0.0656509 4.33029 0.0934725L0.381674 1.95313C0.124453 2.07979 -0.0268408 2.35308 0.00236378 2.6383C0.20926 4.60382 1.06616 9.43554 5.81443 14.1842C10.5627 18.9328 15.3937 19.7893 17.3603 19.9962C17.6455 20.0254 17.9188 19.8741 18.0455 19.6169L19.9051 15.6683C20.0637 15.3509 19.9555 14.965 19.6551 14.7762L15.8358 12.3173C15.5636 12.1468 15.2096 12.1868 14.9824 12.4138L13.4382 13.9586C13.288 14.1099 13.0759 14.1827 12.8644 14.1555C12.0996 14.0583 10.1906 13.6273 8.28167 11.7183Z" fill="white"/>
                                          <path d="M15.862 10.6897C15.4811 10.6897 15.1724 10.3809 15.1724 9.99999C15.1691 7.14468 12.8553 4.83079 9.99996 4.82756C9.61907 4.82756 9.3103 4.51879 9.3103 4.1379C9.3103 3.75701 9.61907 3.44824 9.99996 3.44824C13.6167 3.45223 16.5477 6.38322 16.5517 9.99999C16.5517 10.3809 16.2429 10.6897 15.862 10.6897Z" fill="white"/>
                                          <path d="M19.3103 10.6897C18.9294 10.6897 18.6206 10.3809 18.6206 10C18.6153 5.24113 14.7588 1.38463 9.99996 1.37931C9.61907 1.37931 9.3103 1.07054 9.3103 0.689655C9.3103 0.308769 9.61907 0 9.99996 0C15.5203 0.00608133 19.9939 4.47967 20 10C20 10.1829 19.9273 10.3583 19.798 10.4877C19.6686 10.617 19.4932 10.6897 19.3103 10.6897Z" fill="white"/>
                                        </g>
                                        <defs>
                                          <clipPath id="clip0_1_1974">
                                            <rect width="20" height="20" fill="white"/>
                                          </clipPath>
                                        </defs>
                                      </svg>
                                </div>
                                <div>
                                    <p class="text"> 
                                        <span> {!! __("For private individuals:.title") !!}</span> <br>
                                        <a href="tel:+749928313006">+7 499 283 13006</a>  
                                    </p>
                                </div>
                            </div> 
                            <div class="item">
                                <div class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                        <g clip-path="url(#clip0_1_1974)">
                                          <path d="M8.28167 11.7183C6.37271 9.80934 5.94167 7.90037 5.84443 7.13554C5.81726 6.92407 5.89004 6.71198 6.04133 6.56175L7.58616 5.01761C7.8134 4.7905 7.85373 4.43657 7.6834 4.16416L5.22374 0.344852C5.0353 0.0432134 4.64838 -0.0656509 4.33029 0.0934725L0.381674 1.95313C0.124453 2.07979 -0.0268408 2.35308 0.00236378 2.6383C0.20926 4.60382 1.06616 9.43554 5.81443 14.1842C10.5627 18.9328 15.3937 19.7893 17.3603 19.9962C17.6455 20.0254 17.9188 19.8741 18.0455 19.6169L19.9051 15.6683C20.0637 15.3509 19.9555 14.965 19.6551 14.7762L15.8358 12.3173C15.5636 12.1468 15.2096 12.1868 14.9824 12.4138L13.4382 13.9586C13.288 14.1099 13.0759 14.1827 12.8644 14.1555C12.0996 14.0583 10.1906 13.6273 8.28167 11.7183Z" fill="white"/>
                                          <path d="M15.862 10.6897C15.4811 10.6897 15.1724 10.3809 15.1724 9.99999C15.1691 7.14468 12.8553 4.83079 9.99996 4.82756C9.61907 4.82756 9.3103 4.51879 9.3103 4.1379C9.3103 3.75701 9.61907 3.44824 9.99996 3.44824C13.6167 3.45223 16.5477 6.38322 16.5517 9.99999C16.5517 10.3809 16.2429 10.6897 15.862 10.6897Z" fill="white"/>
                                          <path d="M19.3103 10.6897C18.9294 10.6897 18.6206 10.3809 18.6206 10C18.6153 5.24113 14.7588 1.38463 9.99996 1.37931C9.61907 1.37931 9.3103 1.07054 9.3103 0.689655C9.3103 0.308769 9.61907 0 9.99996 0C15.5203 0.00608133 19.9939 4.47967 20 10C20 10.1829 19.9273 10.3583 19.798 10.4877C19.6686 10.617 19.4932 10.6897 19.3103 10.6897Z" fill="white"/>
                                        </g>
                                        <defs>
                                          <clipPath id="clip0_1_1974">
                                            <rect width="20" height="20" fill="white"/>
                                          </clipPath>
                                        </defs>
                                      </svg>
                                </div>
                                <div>
                                    <p class="text"> 
                                        <span>{!! __("For legal entities:.title") !!}</span> <br>
                                        <a href="tel:+7 499 283 13006">+7 499 283 13006</a>  
                                    </p>
                                </div>
                            </div> 
                            <div class="item">
                                <div class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="17" viewBox="0 0 24 17" fill="none">
                                        <g clip-path="url(#clip0_1_1992)">
                                          <path d="M23.2417 1.72742L16.1304 8.793L23.2417 15.8586C23.3703 15.5899 23.4483 15.2928 23.4483 14.9756V2.61035C23.4483 2.29311 23.3703 1.99611 23.2417 1.72742Z" fill="white"/>
                                          <path d="M21.3873 0.549561H2.06078C1.74355 0.549561 1.44655 0.627554 1.17786 0.756107L10.2669 9.7994C11.0706 10.6031 12.3775 10.6031 13.1811 9.7994L22.2702 0.756107C22.0015 0.627554 21.7045 0.549561 21.3873 0.549561Z" fill="white"/>
                                          <path d="M0.206546 1.72742C0.077993 1.99611 0 2.29311 0 2.61035V14.9756C0 15.2929 0.077993 15.5899 0.206546 15.8586L7.31792 8.793L0.206546 1.72742Z" fill="white"/>
                                          <path d="M15.1588 9.76453L14.1525 10.7708C12.8135 12.1099 10.6346 12.1099 9.29549 10.7708L8.28923 9.76453L1.17786 16.8301C1.44655 16.9587 1.74355 17.0367 2.06078 17.0367H21.3873C21.7045 17.0367 22.0015 16.9587 22.2702 16.8301L15.1588 9.76453Z" fill="white"/>
                                        </g>
                                        <defs>
                                          <clipPath id="clip0_1_1992">
                                            <rect width="23.4483" height="17" fill="white"/>
                                          </clipPath>
                                        </defs>
                                      </svg>
                                </div>
                                <div>
                                    <p class="text"> 
                                        <span>{!! __("Support:.title") !!}</span><br>
                                        <a href="mailto:support@hyper.hosting">support@hyper.hosting</a>
                                    </p>
                                </div>
                            </div> 
                            <div class="item">
                                <div class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="17" viewBox="0 0 24 17" fill="none">
                                        <g clip-path="url(#clip0_1_1992)">
                                          <path d="M23.2417 1.72742L16.1304 8.793L23.2417 15.8586C23.3703 15.5899 23.4483 15.2928 23.4483 14.9756V2.61035C23.4483 2.29311 23.3703 1.99611 23.2417 1.72742Z" fill="white"/>
                                          <path d="M21.3873 0.549561H2.06078C1.74355 0.549561 1.44655 0.627554 1.17786 0.756107L10.2669 9.7994C11.0706 10.6031 12.3775 10.6031 13.1811 9.7994L22.2702 0.756107C22.0015 0.627554 21.7045 0.549561 21.3873 0.549561Z" fill="white"/>
                                          <path d="M0.206546 1.72742C0.077993 1.99611 0 2.29311 0 2.61035V14.9756C0 15.2929 0.077993 15.5899 0.206546 15.8586L7.31792 8.793L0.206546 1.72742Z" fill="white"/>
                                          <path d="M15.1588 9.76453L14.1525 10.7708C12.8135 12.1099 10.6346 12.1099 9.29549 10.7708L8.28923 9.76453L1.17786 16.8301C1.44655 16.9587 1.74355 17.0367 2.06078 17.0367H21.3873C21.7045 17.0367 22.0015 16.9587 22.2702 16.8301L15.1588 9.76453Z" fill="white"/>
                                        </g>
                                        <defs>
                                          <clipPath id="clip0_1_1992">
                                            <rect width="23.4483" height="17" fill="white"/>
                                          </clipPath>
                                        </defs>
                                      </svg>
                                </div>
                                <div> 
                                    <p class="text"> 
                                        <span>{!! __("Financial issues:.title") !!}</span><br>
                                        <a href="mailto:fin@hyper.hosting">ceo@hyper.hosting</a>
                                    </p>
                                </div>
                            </div> 
                            <div class="item">
                                <div class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="17" viewBox="0 0 24 17" fill="none">
                                        <g clip-path="url(#clip0_1_1992)">
                                          <path d="M23.2417 1.72742L16.1304 8.793L23.2417 15.8586C23.3703 15.5899 23.4483 15.2928 23.4483 14.9756V2.61035C23.4483 2.29311 23.3703 1.99611 23.2417 1.72742Z" fill="white"/>
                                          <path d="M21.3873 0.549561H2.06078C1.74355 0.549561 1.44655 0.627554 1.17786 0.756107L10.2669 9.7994C11.0706 10.6031 12.3775 10.6031 13.1811 9.7994L22.2702 0.756107C22.0015 0.627554 21.7045 0.549561 21.3873 0.549561Z" fill="white"/>
                                          <path d="M0.206546 1.72742C0.077993 1.99611 0 2.29311 0 2.61035V14.9756C0 15.2929 0.077993 15.5899 0.206546 15.8586L7.31792 8.793L0.206546 1.72742Z" fill="white"/>
                                          <path d="M15.1588 9.76453L14.1525 10.7708C12.8135 12.1099 10.6346 12.1099 9.29549 10.7708L8.28923 9.76453L1.17786 16.8301C1.44655 16.9587 1.74355 17.0367 2.06078 17.0367H21.3873C21.7045 17.0367 22.0015 16.9587 22.2702 16.8301L15.1588 9.76453Z" fill="white"/>
                                        </g>
                                        <defs>
                                          <clipPath id="clip0_1_1992">
                                            <rect width="23.4483" height="17" fill="white"/>
                                          </clipPath>
                                        </defs>
                                      </svg>
                                </div>
                                <div> 
                                    <p class="text"> 
                                        <span>{!! __("Police inquiries:.title") !!}</span><br>
                                        <a href="mailto:police@hyper.hosting">ceo@hyper.hosting</a>
                                    </p>
                                </div>
                            </div>
                            <div class="item">
                                <div class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="17" viewBox="0 0 24 17" fill="none">
                                        <g clip-path="url(#clip0_1_1992)">
                                          <path d="M23.2417 1.72742L16.1304 8.793L23.2417 15.8586C23.3703 15.5899 23.4483 15.2928 23.4483 14.9756V2.61035C23.4483 2.29311 23.3703 1.99611 23.2417 1.72742Z" fill="white"/>
                                          <path d="M21.3873 0.549561H2.06078C1.74355 0.549561 1.44655 0.627554 1.17786 0.756107L10.2669 9.7994C11.0706 10.6031 12.3775 10.6031 13.1811 9.7994L22.2702 0.756107C22.0015 0.627554 21.7045 0.549561 21.3873 0.549561Z" fill="white"/>
                                          <path d="M0.206546 1.72742C0.077993 1.99611 0 2.29311 0 2.61035V14.9756C0 15.2929 0.077993 15.5899 0.206546 15.8586L7.31792 8.793L0.206546 1.72742Z" fill="white"/>
                                          <path d="M15.1588 9.76453L14.1525 10.7708C12.8135 12.1099 10.6346 12.1099 9.29549 10.7708L8.28923 9.76453L1.17786 16.8301C1.44655 16.9587 1.74355 17.0367 2.06078 17.0367H21.3873C21.7045 17.0367 22.0015 16.9587 22.2702 16.8301L15.1588 9.76453Z" fill="white"/>
                                        </g>
                                        <defs>
                                          <clipPath id="clip0_1_1992">
                                            <rect width="23.4483" height="17" fill="white"/>
                                          </clipPath>
                                        </defs>
                                      </svg>
                                </div>
                                <div> 
                                    <p class="text">  
                                        <span>{!! __("Partnership:.title") !!}</span><br>
                                        <a href="mailto:partners@hyper.hosting">hh@hyper.hosting</a>
                                    </p>
                                </div>
                            </div> 
                        </div>
                  </div>
            </div>


 
@endsection