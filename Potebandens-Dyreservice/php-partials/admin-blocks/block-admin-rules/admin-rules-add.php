<div class="block admin-rules-add">
    <div class="container">
        <hr>
        <h2 class="admin-titles">Regler og retningslinjer</h2>
        <div class="form">
            <div class="add_rule">
                <div id="show_add_rule">Tilføj Regler</div>
                <div id="hide_add_rule">Skjul formular</div>
            </div>

            <div id="new_rule">
                <div class="new_rule">

                    <h2>Tilføj Regler</h2>
                    <p class="span"><span>*</span> SKAL udfyldes</p>

                    <form method="post">

                        <!-- where rules apply  -->
                        <div class="input-rules">
                            <label for="rules">Hvor gælder disse regler? <span>*</span></label>
                            <div class="input">
                                <input type="text" name="rules" placeholder="Generelle regler, Hundelegestuen, Hundebørnehaven etc.">
                            </div>
                        </div>

                        <!-- points -->
                        <label for="point_one">Regler</label>
                        <p>Hvert tekstfelt kan indeholde 1 regel på max 250 tegn.<br>Som minimum skal det første felt udfyldes.</p>
                        <div class="point_rules">
                            <div class="row-one">
                                <!-- point one -->
                                <div class="one">
                                    <div class="input">
                                        <p class="star">*</p>
                                        <div class="pull-tab"></div>
                                        <textarea name="point_one" id="point_one" placeholder="1"></textarea>
                                    </div>
                                </div>
                                <!-- point two -->
                                <div class="two">
                                    <div class="input">
                                        <div class="pull-tab"></div>
                                        <textarea name="point_two" id="point_two" placeholder="2"></textarea>
                                    </div>
                                </div>
                                <!-- point three -->
                                <div class="three">
                                    <div class="input">
                                        <div class="pull-tab"></div>
                                        <textarea name="point_three" id="point_three" placeholder="3"></textarea>
                                    </div>
                                </div>
                                <!-- point four -->
                                <div class="four">
                                    <div class="input">
                                        <div class="pull-tab"></div>
                                        <textarea name="point_four" id="point_four" placeholder="4"></textarea>
                                    </div>
                                </div>
                                <!-- point five -->
                                <div class="five">
                                    <div class="input">
                                        <div class="pull-tab"></div>
                                        <textarea name="point_five" id="point_five" placeholder="5"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row-two">
                                <!-- point six -->
                                <div class="six">
                                    <div class="input">
                                        <div class="pull-tab"></div>
                                        <textarea name="point_six" id="point_six" placeholder="6"></textarea>
                                    </div>
                                </div>
                                <!-- point seven -->
                                <div class="seven">
                                    <div class="input">
                                        <div class="pull-tab"></div>
                                        <textarea name="point_seven" id="point_seven" placeholder="7"></textarea>
                                    </div>
                                </div>
                                <!-- point eight -->
                                <div class="eight">
                                    <div class="input">
                                        <div class="pull-tab"></div>
                                        <textarea name="point_eight" id="point_eight" placeholder="8"></textarea>
                                    </div>
                                </div>
                                <!-- point nine -->
                                <div class="nine">
                                    <div class="input">
                                        <div class="pull-tab"></div>
                                        <textarea name="point_nine" id="point_nine" placeholder="9"></textarea>
                                    </div>
                                </div>
                                <!-- point ten -->
                                <div class="ten">
                                    <div class="input">
                                        <div class="pull-tab"></div>
                                        <textarea name="point_ten" id="point_ten" placeholder="10"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="button">
                        <button id="create-rules">Tilføj Regler</button>
                    </div>
                </div> <!-- .new_rule end -->
            </div> <!-- #new_rule end -->
        </div> <!-- .form end -->
    </div> <!-- .container end -->
</div> <!-- .r end -->