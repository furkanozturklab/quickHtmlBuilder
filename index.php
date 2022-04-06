<!DOCTYPE html>
<html>

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="public/css/style.css" rel="stylesheet">
</head>


<body>

    <section class="step-section">


        <div class="step-card">
            <div class="buildSuccess">

                <a href="">Download Zip Dosya</a>
            </div>

            <div class="step-content">
                <div id="step1" class="step-front active">
                    <div class="step-body content-center">
                        <div class="step-ico"> </div>
                        <h1 class="step-header">Html Builder</h1>
                        <p class="step-text">
                            Html buildera hoş geldiniz. Modülüm amacı bir projeye başlarken ihtiyac duyduğunuz frameworkleri ve yapıları hazır sekilde oluşturarak başlangıç aşamasını olabildiğince kısatmaktır.
                            Gerkli adımları izledikten sonra modül size bir zip çıktısı oluşturmaktadır.
                        </p>
                        <div class="step-button">
                            <button onclick="nextStep(1)"> Başla </button>
                        </div>
                    </div>
                    <div class="step-info">
                        <div class="step-github"><a href="https://github.com/ozturk-furkan/htmlQuickBuilder.git" target="_blank"> <i class="fa-brands fa-github"></i> Github</a></div>
                        <div class="step-version">Versiyon 0.1.0</div>
                    </div>
                </div>
                <div id="step2" class="step-front">
                    <div class="step-body general-structure">
                        <div class="step-stage-header col-12">Genel Yapılar</div>
                        <div class="items col-12">
                            <div class="item-left col-3">
                                <label class="item-name" for="projectName">Proje İsmi</label>
                            </div>
                            <div class="item-right col-9">
                                <input type="text" class="form-control-sm" id="projectName" aria-describedby="projectName" placeholder="Proje İsmi">
                                <span>Proje title ve klasör adı olarak kabul edilecek</span>
                            </div>
                        </div>
                        <div class="items col-12">
                            <div class="item-left col-3">
                                <label class="item-name" for="projectName">Head Tanımları</label>
                            </div>
                            <div class="item-right col-9">
                                <div class="chexkbox-group col-12">
                                    <div class="check-item">
                                        <input type="checkbox" class="form-check-input" id="metaCheckBox" onclick="buildcheckbox('metaCheckBox','head','true','Metatag')">
                                        <label class="form-check-label" for="metaCheckBox">Metatag</label>
                                    </div>

                                    <div class="check-item">
                                        <input type="checkbox" class="form-check-input" id="viewCheckBox" onclick="buildcheckbox('viewCheckBox','head','true','Viewport')">
                                        <label class="form-check-label" for="viewCheckBox">Viewport</label>
                                    </div>

                                    <div class="check-item">
                                        <input type="checkbox" class="form-check-input" id="responsiveCheckBox" onclick="buildcheckbox('responsiveCheckBox','head','true','Responsive')">
                                        <label class="form-check-label" for="responsiveCheckBox">Responsive</label>
                                    </div>

                                    <div class="check-item">
                                        <input type="checkbox" class="form-check-input" id="charsetCheckBox" onclick="buildcheckbox('charsetCheckBox','head','true','Charset')">
                                        <label class="form-check-label" for="charsetCheckBox">Charset UTF-8</label>
                                    </div>
                                    <span>Aktif olmasını istediklerinizi işaretleyin</span>
                                </div>
                            </div>
                        </div>

                        <div class="items col-12" style="margin-top: 20px;">
                            <div class="item-left col-3">
                                <label class="item-name" for="projectName">Klasör Yapısı</label>
                            </div>
                            <div class="item-right col-9">
                                <select id="folderSelected">
                                    <option value="simple">Basit</option>
                                    <option value="regular">Düzenli</option>
                                    <option value="developed">Gelişmiş</option>
                                </select>
                                <span> 1-Basit genel html kullanımı için uygun yapı modeli</span>
                                <span> 2-Düzenli asp.net , php ile kullanımına uygun yapı modeli</span>
                                <span> 3-Gelişmiş asp,php için uygun ayrıca gelişmiş teknolojiler için uygun</span>
                            </div>
                        </div>
                        <div class="step-button">
                            <button onclick="backStep(2)"> Geri </button>
                            <button onclick="nextStep(2)"> Devam </button>
                        </div>
                    </div>
                    <div class="step-info">
                        <div class="step-github"><a href="https://github.com/ozturk-furkan/htmlQuickBuilder.git" target="_blank"> <i class="fa-brands fa-github"></i> Github</a></div>
                        <div class="step-stage"> Aşama 1 / 3 </div>
                    </div>
                </div>
                <div id="step3" class="step-front">
                    <div class="step-body framework-structure">
                        <div class="step-stage-header col-12">Kütüphaneler</div>
                        <div class="items col-12">
                            <div class="item-left col-3">
                                <label class="item-name" for="projectName">Css Kütüphaneleri</label>
                            </div>
                            <div class="item-right col-9">
                                <div class="chexkbox-group col-12">
                                    <div class="check-item">
                                        <input type="checkbox" class="form-check-input" id="bootstrapCss" onclick="buildcheckbox('bootstrapCss','cssfr','true','Boostrap Css')">
                                        <label class="form-check-label" for="bootstrapCss">BootstrapCss</label>
                                    </div>
                                    <div class="check-item">
                                        <input type="checkbox" class="form-check-input" id="animateCss" onclick="buildcheckbox('animateCss','cssfr','true','Animate Css')">
                                        <label class="form-check-label" for="animateCss">Animate Css</label>
                                    </div>
                                    <div class="check-item">
                                        <input type="checkbox" class="form-check-input" id="haumburgerCss" onclick="buildcheckbox('haumburgerCss','cssfr','true','Haumberger Css')">
                                        <label class="form-check-label" for="haumburgerCss">Hamburger Css</label>
                                    </div>

                                    <div class="check-item">
                                        <input type="checkbox" class="form-check-input" id="jqueryUIcss" onclick="buildcheckbox('jqueryUIcss','cssfr','true','Jquery UI Css')">
                                        <label class="form-check-label" for="jqueryUIcss">Jquery UI Css</label>
                                    </div>
                                    <span>Eklemek istediğiniz kütüphaneleri seçiniz</span>
                                </div>

                                <!-- sıradki güncellemede 
                                <div class="dynamic-inputs">
                                    <div class="manuel-text">Manuel CDK Seklinde ekle :</div>
                                    <div class="dynamic-input">
                                        <input type="text">
                                        <button type="button" name="dynamic_css_add_button">Ekle</button>
                                    </div>
                                    <div class="dynamic-adds">
                                    </div>
                                </div>
                                -->
                            </div>
                        </div>
                        <div class="items col-12">
                            <div class="item-left col-3">
                                <label class="item-name" for="projectName">Js Kütüphaneleri</label>
                            </div>
                            <div class="item-right col-9">
                                <div class="chexkbox-group col-12">
                                    <div class="check-item">
                                        <input type="checkbox" class="form-check-input" id="jqueryJs" onclick="buildcheckbox('jqueryJs','jsfr','true','Jquery Js')">
                                        <label class="form-check-label" for="jqueryJs">Jquery</label>
                                    </div>
                                    <div class="check-item">
                                        <input type="checkbox" class="form-check-input" id="jqueryUIJs" onclick="buildcheckbox('jqueryUIJs','jsfr','true','Jquery UI Js')">
                                        <label class="form-check-label" for="jqueryUIJs">Jquery UI</label>
                                    </div>

                                    <div class="check-item">
                                        <input type="checkbox" class="form-check-input" id="bootstrapJs" onclick="buildcheckbox('bootstrapJs','jsfr','true','Bootstrap Js')">
                                        <label class="form-check-label" for="bootstrapJs">Bootstrap Js</label>
                                    </div>
                                    <span>Eklemek istediğiniz kütüphaneleri seçiniz</span>
                                </div>

                                <!-- sıradki güncellemede 
                                <div class="dynamic-inputs">
                                    <div class="manuel-text">Manuel CDK Seklinde ekle :</div>
                                    <div class="dynamic-input">
                                        <input type="text">
                                        <button type="button" name="dynamic_css_add_button">Ekle</button>
                                    </div>
                                    <div class="dynamic-adds">
                                    </div>s
                                </div>
                                -->
                            </div>
                        </div>
                        <div class="step-button">
                            <button onclick="backStep(3)"> Geri </button>
                            <button onclick="nextStep(3)"> Devam </button>
                        </div>
                    </div>
                    <div class="step-info">
                        <div class="step-github"><a href="https://github.com/ozturk-furkan/htmlQuickBuilder.git" target="_blank"> <i class="fa-brands fa-github"></i> Github</a></div>
                        <div class="step-stage"> Aşama 2 / 3 </div>
                    </div>
                </div>
                <div id="step4" class="step-front">
                    <div class="step-body">
                        <div class="step-stage-header col-12">Yapım Özeti</div>
                        <div class="log-panel">
                            <span class="dark"> [<?= date('d/m/Y H:i:s'); ?>] - Builder start </span>
                        </div>
                        <div class="step-button">
                            <button onclick="backStep(4)"> Geri </button>
                            <button onclick="builder()"> Oluştur </button>
                        </div>
                    </div>
                    <div class="step-info">
                        <div class="step-github"><a href="https://github.com/ozturk-furkan/htmlQuickBuilder.git" target="_blank"> <i class="fa-brands fa-github"></i> Github</a></div>
                        <div class="step-stage"> Aşama 3 / 3 </div>
                    </div>
                </div>
            </div>
        </div>

        <form id="builder" style="display: none;" method="POST" action="builder">




        </form>
    </section>


    <script src="public/js/control.js"></script>
</body>



</html>