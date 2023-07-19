@extends("layouts/app")


@section("head")
<link href="{{ asset('css/scuba.css') }}" rel="stylesheet">
@endsection

@section("body")

<!-- 潛水類型介紹 -->
<br>
<h3 class="text-white text-leftr"><b><span class="material-symbols-sharp">scuba_diving</span>水肺介紹</b></h3>
<div class="div-c">
    <div class="content">
        <br>
        <img src="{{ asset('img/scuba/水肺潛水.jpg') }}" class="img_size2" alt="">
    </div>
    <div>
        <div class="main">
            <article class="text">
                <h3>
                    <mark><b>水肺潛水</b></mark>
                </h3>
                <br>
                <A>水肺潛水需要穿戴較為完整的水下呼吸裝置進行的潛水活動，一套完整的裝備通常包含呼吸調節器、氣瓶、配重等，雖然重量較重，但只要潛入水中，水的浮力能夠完全支撐裝備的重量，使潛水員能輕鬆自在的探索。</A>
                <input id="read-more-check-1" type="checkbox" class="read-more-check">
                <label for="read-more-check-1" class="read-more-label"></label>
                <A class="read-more">與其他潛水方式不同，水肺潛水需要獲得認可機構簽發的潛水證照，經過系統性的培訓和訓練後，潛水員才能確保在水下活動中的安全，這些技能包括正確使用潛水裝備、掌握潛水程序和安全規範，以及應對潛水相關的緊急情況。水肺潛水提供了一個令人難以置信的機會，讓潛水員能夠暢遊在美麗的海洋中。潛水員可以探索各種景觀，如珊瑚礁、海底地形和沉船遺址。此外，他們還能觀察到許多令人驚嘆的海洋生物，包括熱帶魚類、海龜、鯊魚和鯨魚。水肺潛水的一個重要優勢是可以在水下停留較長的時間，這使得潛水員能夠更深入的探索水下世界，並欣賞到更多的海洋生物以及海底景觀。水肺潛水不僅僅是一項活動，它還是一個充滿挑戰性的冒險，透過獲得專業的潛水證照，你可以在世界各地的熱帶水域中享受這項活動，無論你是一個尋求刺激的冒險家，還是一個愛好自然的人，水肺潛水將為你帶來難以忘懷的體驗。</A>
            </article>
        </div>

    </div>
</div>

<!-- 設備 -->
<br>

<h3 class="text-white text-leftr"><b><span class="material-symbols-sharp">construction</span>水肺設備</b></h3>
<div class="carousel-slider">
    <input type="radio" name="control" id="slide1" checked>
    <input type="radio" name="control" id="slide2">
    <input type="radio" name="control" id="slide3">
    <input type="radio" name="control" id="slide4">
    <input type="radio" name="control" id="slide5">
    <input type="radio" name="control" id="slide6">
    <input type="radio" name="control" id="slide7">
    <input type="radio" name="control" id="slide8">
    <input type="radio" name="control" id="slide9">

    <div class="slider-nav-prev">

        <label for="slide1" class="prev prev-1"></label>
        <label for="slide2" class="prev prev-2"></label>
        <label for="slide3" class="prev prev-3"></label>
        <label for="slide4" class="prev prev-4"></label>
        <label for="slide5" class="prev prev-5"></label>
        <label for="slide6" class="prev prev-6"></label>
        <label for="slide7" class="prev prev-7"></label>
        <label for="slide8" class="prev prev-8"></label>
        <label for="slide9" class="prev prev-9"></label>

    </div>

    <div class="slider-nav-next">
        <label for="slide1" class="next next-1"></label>
        <label for="slide2" class="next next-2"></label>
        <label for="slide3" class="next next-3"></label>
        <label for="slide4" class="next next-4"></label>
        <label for="slide5" class="next next-5"></label>
        <label for="slide6" class="next next-6"></label>
        <label for="slide7" class="next next-7"></label>
        <label for="slide8" class="next next-8"></label>
        <label for="slide9" class="next next-9"></label>
    </div>

    <div class="slider-nav-number">
        <label for="slide1" class="slide-nav-1">1</label> <!-- ... 按鈕名字 ... -->
        <label for="slide2" class="slide-nav-2">2</label>
        <label for="slide3" class="slide-nav-3">3</label>
        <label for="slide4" class="slide-nav-4">4</label>
        <label for="slide5" class="slide-nav-5">5</label>
        <label for="slide6" class="slide-nav-6">6</label>
        <label for="slide7" class="slide-nav-7">7</label>
        <label for="slide8" class="slide-nav-8">8</label>
        <label for="slide9" class="slide-nav-9">9</label>
    </div>

    <div class="slides">
        <div id="slide-1" class="slide">
            <div>
                <h3 class="title">潛水面鏡</h3>
            </div> <!-- ... 設備名字 ... -->
            <div><img src="{{ asset('img/scuba/aaa.png') }}" class="img_size3" alt=""></div>
        </div>
        <div id="slide-2" class="slide">
            <div>
                <h3 class="title">防寒衣</h3>
            </div> <!-- ... 設備名字 ... -->
            <div><img src="{{ asset('img/scuba/bbb.png') }}" class="img_size3" alt=""></div>
        </div>
        <div id="slide-3" class="slide">
            <div>
                <h3 class="title">短蛙鞋</h3>
            </div> <!-- ... 設備名字 ... -->
            <div><img src="{{ asset('img/scuba/ccc.png') }}" class="img_size3" alt=""></div>
        </div>
        <div id="slide-4" class="slide">
            <div>
                <h3 class="title">套鞋</h3>
            </div> <!-- ... 設備名字 ... -->
            <div><img src="{{ asset('img/scuba/ddd.png') }}" class="img_size3" alt=""></div>
        </div>
        <div id="slide-5" class="slide">
            <div>
                <h3 class="title">配重袋</h3>
            </div> <!-- ... 設備名字 ... -->
            <div><img src="{{ asset('img/scuba/eee.png') }}" class="img_size3" alt=""></div>
        </div>
        <div id="slide-6" class="slide">
            <div>
                <h3 class="title">潛水氣瓶</h3>
            </div> <!-- ... 設備名字 ... -->
            <div><img src="{{ asset('img/scuba/fff.png') }}" class="img_size3" alt=""></div>
        </div>
        <div id="slide-7" class="slide">
            <div>
                <h3 class="title">呼吸調節器</h3>
            </div> <!-- ... 設備名字 ... -->
            <div><img src="{{ asset('img/scuba/ggg.png') }}" class="img_size3" alt=""></div>
        </div>
        <div id="slide-8" class="slide">
            <div>
                <h3 class="title">BCD</h3>
            </div> <!-- ... 設備名字 ... -->
            <div><img src="{{ asset('img/scuba/hhh.png') }}" class="img_size3" alt=""></div>
        </div>
        <div id="slide-9" class="slide">
            <div>
                <h3 class="title">浮力袋</h3>
            </div> <!-- ... 設備名字 ... -->
            <div><img src="{{ asset('img/scuba/iii.png') }}" class="img_size3" alt=""></div>
        </div>
    </div>
</div>


<!-- 證照 -->
<br>
<div class="div">
    <h3 class="text-white text-leftr"><b><span class="material-symbols-sharp">trophy</span>水肺證照</b></h3>

    <baba>

        <div class="div-container">
            <!-- 左邊 -->
            <div class="div left-accordion ">
                <img src="{{ asset('img/scuba/PADI.jpg') }}" class="img_size" alt="">
                <ul>
                    <li>
                        <!-- ...  
            <input type="checkbox" checked>
            <i></i>
            ... -->
                        <h2><b>簡介</b></h2>
                        <div class="accordion-collapse collapse show">
                            <p>PADI是 Professional Association of Diver Instructor (潛水教練專業協會)的英文縮寫，為全球現在最普遍的證照系統，是基於教學原則設計出一套全球統一標準的潛水教學系統。</p>
                        </div>
                    </li>
                    <li>
                        <input type="checkbox" checked>
                        <i></i>
                        <h2><b>初級開放水域潛水員</b></h2>
                        <p>Open Water (OW)。是潛水證照中最初階的課程，目標是讓學員可以下潛至水下18米，會學一些基本的裝備操作、浮力控制、緊急情況應變，這是開放水域初級潛水員最基本的潛水課程。</p>
                    </li>
                    <li>
                        <input type="checkbox" checked>
                        <i></i>
                        <h2><b>進階開放水域潛水員</b></h2>
                        <p>Advance Open Water (AOW)。年齡需滿12歲以上，進階潛水課程會更加扎實的訓練水底導航能力、如何用電腦錶瞭解潛水計劃，並能學習深潛、夜潛、船潛等多項潛水專長。</p>
                    </li>
                    <li>
                        <input type="checkbox" checked>
                        <i></i>
                        <h2><b>救援潛水員</b></h2>
                        <p>Rescue。這個等級專注於潛水安全和事故救援技能的培訓，學習如何避免和應對處理水下事故，並掌握急救和潛水救援技巧，注重「自救」與「救人」，能增強自己的潛水技術能力。</p>
                    </li>
                    <li>
                        <input type="checkbox" checked>
                        <i></i>
                        <h2><b>潛水長</b></h2>
                        <p>Dive Master。至少年滿18歲，需有PADI進階開放水域潛水員證書和PADI救援潛水員證書、至少40次水肺潛水記錄、在最近24個月內完成EFR緊急第一反應首要及次要救護訓練、過去12個月內經醫師評估並證明健康狀況適合潛水。</p>
                    </li>
                    <li>
                        <input type="checkbox" checked>
                        <i></i>
                        <h2><b>潛水教練</b></h2>
                        <p>Diving Instructor。需年滿18歲，如果不是PADI潛水長，必須完成PADI潛水長課程潛水救援評估。參加IDC課程前，需有60 次潛水記錄，並有水底導航、夜潛、深潛經驗的潛水記錄證明。參加IDC考試前，需有100次潛水記錄，且成為合格潛水員至少已有六個月。提出 12 個月內的醫師證明，證實身體狀況適合潛水。在 24 個月內完成 EFR 緊急第一反應首要救護和次要救護(或符合資格的訓練)。</p>
                    </li>
                </ul>
            </div>
            <!-- 右邊 -->
            <div class="div right-accordion">
                <img src="{{ asset('img/scuba/CMAS.jpg') }}" class="img_size" alt="">
                <ul>
                    <li>
                        <!-- ...
          <input type="checkbox" checked>
          <i></i>
          ... -->
                        <h2><b>簡介</b></h2>
                        <div class="accordion-collapse collapse show">
                            <p>CMAS (Confederation Mondiale Activites Scubaquatiques)，制定了標準化的水肺潛水訓練規則及國際認證系統，並授權合格訓練組織提供水肺潛水的專業培訓與認證發照。CMAS 證照是依星級區分，從一星到五星，下潛深度約從10至30公尺。一星潛水員為最基礎的一張證照，最低考照年齡為14歲，必須於安全水域中正確安全的使用水肺裝備，並於訓練區域以外的開放水域，進行累積經驗之潛水，且潛水時，並需有教練或三星以上潛水員同行。</p>
                        </div>
                    </li>
                    <li>

                        <input type="checkbox" checked>
                        <i></i>
                        <h2><b>一星潛水員</b></h2>
                        <p>於安全水域中能正確又安全的使用水肺裝備，這是本系統最基本的初級潛水員等級。</p>
                    </li>
                    <li>
                        <input type="checkbox" checked>
                        <i></i>
                        <h2><b>二星潛水員</b></h2>
                        <p>15歲以上，一星潛水員檢定後有20次潛水經驗，在深度10-30公尺區域潛水10次以上。能於水深10公尺的環境下，正確使用基本的潛水裝備。</p>
                    </li>
                    <li>
                        <input type="checkbox" checked>
                        <i></i>
                        <h2><b>三星潛水員</b></h2>
                        <p>18歲以上，二星潛水員檢定後有50次潛水以上，10-30公尺深度的潛水經驗，其中20次以上是在30公尺水深進行潛水。具有充分經驗、訓練，有責任感的潛水員可於開放水域領導各級潛水員。</p>
                    </li>
                    <li>
                        <input type="checkbox" checked>
                        <i></i>
                        <h2><b>四星潛水員</b></h2>
                        <p>擁有標準以上的潛水知識、能力及廣泛經驗之三星潛水員，能於水中指揮其他潛水員作業。此階級無法以既定內容課程判斷檢定，需依場其經驗及廣泛學習之知識和資格來判定。</p>
                    </li>
                    <li>
                        <input type="checkbox" checked>
                        <i></i>
                        <h2><b>一星教練</b></h2>
                        <p>為三星潛水員，且具備教練能力之教育技術知識者，但不能獨當一面擔任教學監督，只可從事既定課程之教學工作。</p>
                    </li>
                    <li>
                        <input type="checkbox" checked>
                        <i></i>
                        <h2><b>二星教練</b></h2>
                        <p>有經驗之一星教練，擁有於教室、泳池、開放水域教授潛水團體的技術和知識，可勝任一星教練訓練時的助手。</p>
                    </li>
                    <li>
                        <input type="checkbox" checked>
                        <i></i>
                        <h2><b>三星教練</b></h2>
                        <p>具充分經驗之二星教練，可教受各級潛水員或教練，並可負責管理訓練班、中心或特別訓練課程及活動。</p>
                    </li>
                    <li>
                        <input type="checkbox" checked>
                        <i></i>
                        <h2><b>四星教練</b></h2>
                        <p>有特殊經驗與能力之三星教練，經由CTUF技術委員會推選，參與國際性工作，任命則需得到CMAS執行委員會確認後承認。</p>
                    </li>
                </ul>
            </div>
        </div>
    </baba>

</div>

@endsection