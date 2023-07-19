@extends("layouts/app")


@section("head")
<link href="{{ asset('css/freeDiving.css') }}" rel="stylesheet">
@endsection

@section("body")

<!-- 潛水類型介紹 -->
<br>
<h3 class="text-white text-leftr"><b><span class="material-symbols-sharp">scuba_diving</span>自由潛水介紹</b></h3>
<div class="div-c">
    <div class="content">
        <br>
        <img src="{{ asset('img/freeDiving/自由潛水.jpg') }}" class="img_size2" alt="">
    </div>
    <div>
        <div class="main">
            <article class="text">
                <br>
                <h3>
                    <mark><b>自由潛水</b></mark>
                </h3>
                <br>
                <A>自由潛水是透過自身的一口氣下潛，只需要使用目鏡、呼吸管、蛙鞋，即可下潛。這種潛水方式需要依賴個人呼吸技巧，在水中保持呼吸節奏，因此下潛時間完全取決於潛水員的呼吸能力，這種活動結合了休閒娛樂和競賽的性質，使潛水員可以以簡單的裝備探索水下世界。</A>
                <input id="read-more-check-1" type="checkbox" class="read-more-check">
                <label for="read-more-check-1" class="read-more-label"></label>
                <A class="read-more">自由潛水需要潛水者培養良好的呼吸控制和屏息能力，以延長潛水時間，通過持續的練習，潛水者能夠提升他們的憋氣能力、探索深度等。在水下，他們能夠近距離觀察海洋生物、欣賞美麗的珊瑚礁，並且將這些令人驚艷的瞬間記錄下來。
                    然而，自由潛水也有一些潛在的風險，因此接受合格教練的指導和訓練至關重要。在自由潛水課程中，潛水者將學習如何安全地進行潛水活動，包括正確使用裝備、掌握潛水知識、潛伴救援程序和評估潛水環境等。
                    自由潛水不僅是一個挑戰，也是一個機會去發現自己身體的極限，透過持續的努力和訓練，潛水者能夠不斷提升他們的技巧和能力，享受在水下世界中的寧靜和自由，並帶給潛水者美好的回憶。
                </A>
            </article>
        </div>

    </div>
</div>

<!-- 設備 -->
<br>
<h3 class="text-white text-leftr"><b><span class="material-symbols-sharp">construction</span>自由潛水設備</b></h3>

<div class="carousel-slider">

    <input type="radio" name="control" id="slide1" checked>
    <input type="radio" name="control" id="slide2">
    <input type="radio" name="control" id="slide3">
    <input type="radio" name="control" id="slide4">

    <div class="slider-nav-prev">

        <label for="slide1" class="prev prev-1"></label>
        <label for="slide2" class="prev prev-2"></label>
        <label for="slide3" class="prev prev-3"></label>
        <label for="slide4" class="prev prev-4"></label>
    </div>

    <div class="slider-nav-next">
        <label for="slide1" class="next next-1"></label>
        <label for="slide2" class="next next-2"></label>
        <label for="slide3" class="next next-3"></label>
        <label for="slide4" class="next next-4"></label>
    </div>

    <div class="slider-nav-number">
        <label for="slide1" class="slide-nav-1">1</label> <!-- ... 按鈕名字 ... -->
        <label for="slide2" class="slide-nav-2">2</label>
        <label for="slide3" class="slide-nav-3">3</label>
        <label for="slide4" class="slide-nav-4">4</label>
    </div>

    <div class="slides">
        <div id="slide-1" class="slide">
            <div>
                <h3 class="title">呼吸管<br>潛水面鏡</h3>
            </div> <!-- ... 設備名字 ... -->
            <div><img src="{{ asset('img/freeDiving/aaa.png') }}" class="img_size3" alt=""></div>
        </div>
        <div id="slide-2" class="slide">
            <div>
                <h3 class="title">防寒衣</h3>
            </div>
            <div><img src="{{ asset('img/freeDiving/bbb.png') }}" class="img_size3" alt=""></div>
        </div>
        <div id="slide-3" class="slide">
            <div>
                <h3 class="title">長蛙鞋</h3>
            </div>
            <div><img src="{{ asset('img/freeDiving/ccc.png') }}" class="img_size3" alt=""></div>
        </div>
        <div id="slide-4" class="slide">
            <div>
                <h3 class="title">配重袋</h3>
            </div>
            <div><img src="{{ asset('img/freeDiving/ddd.png') }}" class="img_size3" alt=""></div>
        </div>

    </div>

</div>


<br>
<!-- 證照 -->
<br>
<div class="div">
    <h3 class="text-white text-leftr"><b><span class="material-symbols-sharp">trophy</span>自由潛水證照</b></h3>

    <baba>
        <div class="div-container">
            <!-- 左邊 -->
            <div class="div left-accordion ">
                <img src="{{ asset('img/freeDiving/AIDA.jpg') }}" class="img_size" alt="">
                <ul>
                    <li>
                        <!-- ...  
              <input type="checkbox" checked>
              <i></i>
              ... -->
                        <h2><b>簡介</b></h2>
                        <div class="accordion-collapse collapse show">
                            <p>AIDA是目前全世界最大的自由潛水組織，創立於1992年，並建立第一套自潛教育制度、安全規範及比賽準則。AIDA至今也仍在自潛相關的研究、教育、環境及各方面議題上，持續更新進步。</p>
                        </div>
                    </li>
                    <li>
                        <input type="checkbox" checked>
                        <i></i>
                        <h2><b>AIDA 1</b></h2>
                        <p>具備條件：
                            <br>1.身體健康，年滿18歲以上(未滿需獲得父母或監護人同意)
                            <br>2.平游100公尺以上<br>
                            <br>課程標準：無。(完成課程即可獲得證照資格)
                        </p>
                    </li>
                    <li>
                        <input type="checkbox" checked>
                        <i></i>
                        <h2><b>AIDA 2</b></h2>
                        <p>具備條件：
                            <br>1.身體健康，年滿18歲以上(未滿需獲得父母或監護人同意)
                            <br>2.平游200公尺以上<br>
                            <br>課程標準：
                            <br>1.學科筆試測驗正確率75%
                            <br>2.靜態閉氣2分鐘
                            <br>3.動態平潛40公尺
                            <br>4.恆重下潛12~20公尺
                            <br>5.5~10米水中救援
                        </p>
                    </li>
                    <li>
                        <input type="checkbox" checked>
                        <i></i>
                        <h2><b>AIDA 3</b></h2>
                        <p>具備條件：
                            <br>1.身體健康，年滿18歲以上(未滿需獲得父母或監護人同意)
                            <br>2.通過AIDA2證照課程<br>
                            <br>課程標準：
                            <br>1.學科筆試測驗正確率75%
                            <br>2.靜態閉氣2分45秒
                            <br>3.動態平潛55公尺
                            <br>4.恆重下潛24~30公尺
                            <br>5.水下10公尺摘面鏡回到水面
                            <br>6.水下15公尺單純手上升回到水面
                            <br>7.水下15公尺單腳蹼回到水面
                            <br>8.15米水中救援＋50米水面拖拽
                        </p>
                    </li>
                    <li>
                        <input type="checkbox" checked>
                        <i></i>
                        <h2><b>AIDA 4</b></h2>
                        <p>具備條件：
                            <br>1.身體健康，年滿18歲以上(未滿需獲得父母或監護人同意)
                            <br>2.取得AIDA3證照資格
                            <br>3.2年內完成通過急救和CPR培訓<br>
                            <br>課程標準：
                            <br>1.學科筆試測驗正確率75%
                            <br>2.靜態閉氣3分30秒
                            <br>3.動態平潛70公尺
                            <br>4.恆重下潛32~38公尺
                            <br>5.水下20公尺摘面鏡回到水面
                            <br>6.水下20公尺單純手上升回到水面
                            <br>7.水下20公尺單腳蹼回到水面
                            <br>8.單腳蹼15公尺水中救援
                            <br>9.20公尺水中救援＋50公尺水面拖拽
                        </p>
                    </li>

                </ul>
            </div>
            <!-- 中間 -->
            <div class="div mid-accordion">
                <img src="{{ asset('img/freeDiving/PADI.jpg') }}" class="img_size" alt="">
                <ul>
                    <li>
                        <!-- ...
            <input type="checkbox" checked>
            <i></i>
            ... -->
                        <h2><b>簡介</b></h2>
                        <div class="accordion-collapse collapse show">
                            <p>PADI是以水肺潛水起家的知名潛水運動組織，除了有提供完整的水肺潛水系統，在2015年也推出自家的自由潛水認證課程。</p>
                        </div>
                    </li>
                    <li>
                        <input type="checkbox" checked>
                        <i></i>
                        <h2><b>基礎自由潛水員<br>Basic Freediver</b></h2>
                        <p>報考資格：
                            <br>1.年滿12歲以上（未滿18歲需監護人）
                            <br>2.平游200公尺以上或呼吸管浮游300公尺<br>
                            <br>通過標準：
                            <br>1.靜態閉氣1分30秒
                            <br>2.動態平潛25公尺
                        </p>
                    </li>
                    <li>
                        <input type="checkbox" checked>
                        <i></i>
                        <h2><b>自由潛水員 Freediver</b></h2>
                        <p>報考資格：
                            <br>1.年滿15歲以上（未滿18歲需監護人）
                            <br>2.平游200公尺以上或呼吸管浮游300公尺<br>
                            <br>通過標準：
                            <br>1.水中BO救援
                            <br>2.水下5米救援
                            <br>3.水面LMC救援
                            <br>4.動態平潛25公尺
                            <br>5.靜態閉氣1分30秒
                            <br>6.恆重下潛10-16公尺
                        </p>
                    </li>
                    <li>
                        <input type="checkbox" checked>
                        <i></i>
                        <h2><b>高級自由潛水員<br>Advanced Freediver</b></h2>
                        <p>報考資格：
                            <br>1.年滿15歲以上（未滿18歲需監護人）
                            <br>2.通過PADI Freediver(或其他機構同級證照)
                            <br>3.兩年內學習完EFR救護CPR課程
                            <br>4.自由潛水大師Master Freediver<br>
                            <br>通過標準：
                            <br>1.10公尺單蹼上升
                            <br>2.水面LMC救援
                            <br>3.動態平潛50公尺
                            <br>4.10公尺無面鏡上升
                            <br>5.靜態閉氣2分30秒
                            <br>6.恆重下潛20-24公尺
                            <br>7.水下10公尺救援＆拖帶救援＆救援呼吸
                        </p>
                    </li>
                    <li>
                        <input type="checkbox" checked>
                        <i></i>
                        <h2><b>自由潛水大師<br>Master Freediver</b></h2>
                        <p>報考資格：
                            <br>1.年滿18歲以上
                            <br>2.通過PADI Advanced Freediver(或其他機構同級證照)
                            <br>3.兩年內學習完EFR救護CPR課程<br>
                            <br>通過標準：
                            <br>1.動態平潛70公尺
                            <br>2.恆重下潛27-40公尺
                            <br>3.靜態閉氣3分30秒
                            <br>4.水下15公尺救援＆50拖帶＆救援呼吸
                        </p>
                    </li>


                    <!-- 左邊 -->
                    <div class="div right-accordion ">
                        <img src="{{ asset('img/freeDiving/SSI.jpg') }}" class="img_size" alt="">
                        <ul>
                            <li>
                                <!-- ...  
          <input type="checkbox" checked>
          <i></i>
          ... -->
                                <h2><b>簡介</b></h2>
                                <div class="accordion-collapse collapse show">
                                    <p>SSI可以說是世界最大的綜合潛水組織，提供的課程除了水肺潛水，還有自由潛水和技術潛水標準課程等。這家系統跟其他系統最大的不同之處，就是教練必須要綁潛店才能發照，這點對學員來說是比較有保障的，不用擔心找不到教練。</p>
                                </div>
                            </li>
                            <li>
                                <input type="checkbox" checked>
                                <i></i>
                                <h2><b>Basic Freediving</b></h2>
                                <p>報考資格：
                                    <br>1.年滿10歲以上（未滿18歲需監護人同意）<br>
                                    <br>通過標準：無
                                </p>
                            </li>
                            <li>
                                <input type="checkbox" checked>
                                <i></i>
                                <h2><b>Level1</b></h2>
                                <p>報考資格：
                                    <br>1.滿15歲以上（未滿18歲需監護人同意）
                                    <br>2.通過SSI L1(或其他機構同級證照)
                                    <br>3.至少紀錄6次潛水經驗
                                    <br>4.會游泳<br>
                                    <br>通過標準：
                                    <br>1筆試80分以上
                                    <br>2.動態平潛30公尺(有蛙鞋)
                                    <br>3.15米徒手平潛
                                    <br>4.下潛10~20公尺(恆定配重)
                                    <br>5.10公尺LMC & BO救援
                                    <br>6.10公尺無面鏡上升
                                    <br>7.10公尺Key Hole划手上升
                                    <br>
                                </p>
                            </li>

                            <li>
                                <input type="checkbox" checked>
                                <i></i>
                                <h2><b>Level2</b></h2>
                                <p>報考資格：
                                    <br>1.滿15歲以上（未滿18歲需監護人同意）
                                    <br>2.通過SSI L1(或其他機構同級證照)
                                    <br>3.至少紀錄6次潛水經驗
                                    <br>4.會游泳<br>
                                    <br>通過標準：
                                    <br>1.筆試80分以上
                                    <br>2.靜態閉氣2分30秒
                                    <br>3動態平潛50公尺 (有蹼)
                                    <br>4.法蘭佐平壓下潛20~30米
                                    <br>5.15公尺BO救援
                                    <br>6.15公尺徒手上升
                                    <br>7.5公尺無面鏡上升
                                    <br>8.50公尺水面拖帶
                                    <br>9.開放水域LMC救援

                                    <br>
                                </p>
                            </li>

                            <li>
                                <input type="checkbox" checked>
                                <i></i>
                                <h2><b>Level3</b></h2>
                                <p>報考資格：
                                    <br>1.年滿18歲以上
                                    <br>2.通過SSI Level 2(或其他機構同級證照)
                                    <br>3.至少紀錄30次潛水經驗
                                    <br>4.具備不需蛙鞋或浮力裝置，連續400公尺的游泳能力<br>
                                    <br>通過標準：
                                    <br>1.筆試80分
                                    <br>2. 75公尺雙蹼蛙鞋動態閉氣
                                    <br>3.靜態閉氣3分30秒
                                    <br>4.在水深10-12公尺處暖身停留至少1分30秒
                                    <br>5.以功能剩餘容積(FRC)從水面使用進階法蘭左平壓下潛至深度至少10公尺處
                                    <br>6.恆重下潛 (CWT)深度至少30公尺至多40公尺，同時使用進階法蘭左平壓以及自由落體
                                    <br>7.從水深20公尺划手上升
                                    <br>8.從水深20公尺無面鏡上升
                                    <br>9.從水深20公尺處救援意識喪失潛水員至水面，並拖帶25公尺
                                    <br>10.穿戴配重於水深2-4公尺處，救援動態閉氣意識喪失潛水員，自主控制功能喪失潛水員水面救援
                                </p>
                            </li>

                        </ul>
                    </div>

            </div>
    </baba>
</div>

@endsection