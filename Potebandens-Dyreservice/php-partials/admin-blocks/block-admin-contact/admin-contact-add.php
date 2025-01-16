<div class="block form">
    <div class="container">
    <h2 class="admin-titles">Oversigt over kontaktmuligheder</h2>
    <div class="buttons">
        <div class="c">
            <div class="add_contact">
                <div id="show_add_contact">Tilføj Kontakt</div>
                <div id="hide_add_contact">Skjul formular</div>
            </div>

            <div id="new_contact">
                <div class="new_contact">

                    <h2>Tilføj Kontakt</h2>
                    <p class="span"><span>*</span> SKAL udfyldes</p>

                    <form method="post">

                        <div class="contact-top">
                            <div class="contact_name contact-box">
                                <label>Navn <span>*</span></label>
                                <div class="input">
                                    <input type="text" name="contact_name">
                                </div>
                            </div>
                        
                            <div class="contact_work_title contact-box">
                                <label>Arbejdstitel <span>*</span></label>
                                <div class="input">
                                    <input type="text" name="contact_work_title">
                                </div>
                            </div>
                        </div> <!-- .contact-top end -->

                        <div class="contact-bottom">
                            <div class="contact_phone contact-box">
                                <label>Mobil <span>*</span></label>
                                <div class="input">
                                    <input type="text" name="contact_phone">
                                </div>
                            </div>

                            <div class="contact_email contact-box">
                                <label>Email <span>*</span></label>
                                <div class="input">
                                    <input type="text" name="contact_email">
                                </div>
                            </div>
                        </div> <!-- .contact-bottom end -->
                        
                    </form>

                    <div class="button">
                        <button id="create-contact">Tilføj Kontakt</button>
                    </div>

                </div> <!-- .new_contact end -->
            </div> <!-- #new_contact end -->
        </div> <!-- .c end -->

        <div class="o">
            <div class="add_openinghours">
                <div id="show_add_openinghours">Tilføj Åbningstider</div>
                <div id="hide_add_openinghours">Skjul formular</div>
            </div>

            <div id="new_openinghours">
                <div class="new_openinghours">

                    <h2>Tilføj Åbningstider</h2>

                    <div class="openinghours-info">
                        <div class="ifclosed">
                            <p>Lukket?</p>
                            <p>Så kan du nøjes med at udfylde 'Fra' feltet og springe 'Til' feltet over.</p>
                        </div>
                        <div class="vacation-times">
                            <p>Ændrede åbningstider i en ferie?</p>
                            <p>Vælg hvilken ferie nedenfor. Ellers kan du springe det første felt over.</p>
                        </div>
                    </div>
                    

                    <form method="post">

                        <div id="openinghours">
                            <label>Hvilken ferieperiode</label>
                            <div class="input">
                                <select id="vacationform" class="border-left border-right">
                                    <option value="vælg" disabled selected>---- Vælg ----</option>
                                    <option value="Vinterferie">Vinterferie</option>
                                    <option value="Påskeferie">Påskeferie</option>
                                    <option value="Sommerferie">Sommerferie</option>
                                    <option value="Efterårsferie">Efterårsferie</option>
                                    <option value="Juleferie">Juleferie</option>
                                    <option value="Privat Ferie">Privat Ferie</option>
                                </select>
                            </div>
                        </div> <!-- #openinghours end -->

                        <div id="openinghours">
                            <label>Mandag</label>
                            <div class="input">
                                <select id="mondayfromform" class="border-left border-right">
                                    <option value="Fra" selected disabled>--- Fra ---</option>
                                    <option value="Lukket">Lukket</option>
                                    <option value="8:00">8:00</option>
                                    <option value="9:00">9:00</option>
                                    <option value="10:00">10:00</option>
                                    <option value="11:00">11:00</option>
                                    <option value="12:00">12:00</option>
                                    <option value="13:00">13:00</option>
                                    <option value="14:00">14:00</option>
                                    <option value="15:00">15:00</option>
                                    <option value="16:00">16:00</option>
                                    <option value="17:00">17:00</option>
                                    <option value="18:00">18:00</option>
                                    <option value="19:00">19:00</option>
                                    <option value="20:00">20:00</option>
                                </select>
                                <select id="mondaytoform" class="border-left border-right">
                                    <option value="Til" selected disabled>--- Til ---</option>
                                    <option value="8:00">8:00</option>
                                    <option value="9:00">9:00</option>
                                    <option value="10:00">10:00</option>
                                    <option value="11:00">11:00</option>
                                    <option value="12:00">12:00</option>
                                    <option value="13:00">13:00</option>
                                    <option value="14:00">14:00</option>
                                    <option value="15:00">15:00</option>
                                    <option value="16:00">16:00</option>
                                    <option value="17:00">17:00</option>
                                    <option value="18:00">18:00</option>
                                    <option value="19:00">19:00</option>
                                    <option value="20:00">20:00</option>
                                </select>
                            </div> <!-- .input end -->
                        </div> <!-- #openinghours end -->
                        
                        <div id="openinghours">
                            <label>Tirsdag</label>
                            <div class="input">
                                <select id="tuesdayfromform" class="border-left border-right">
                                    <option value="Fra" selected disabled>--- Fra ---</option>
                                    <option value="Lukket">Lukket</option>
                                    <option value="8:00">8:00</option>
                                    <option value="9:00">9:00</option>
                                    <option value="10:00">10:00</option>
                                    <option value="11:00">11:00</option>
                                    <option value="12:00">12:00</option>
                                    <option value="13:00">13:00</option>
                                    <option value="14:00">14:00</option>
                                    <option value="15:00">15:00</option>
                                    <option value="16:00">16:00</option>
                                    <option value="17:00">17:00</option>
                                    <option value="18:00">18:00</option>
                                    <option value="19:00">19:00</option>
                                    <option value="20:00">20:00</option>
                                </select>
                                <select id="tuesdaytoform" class="border-left border-right">
                                    <option value="Til" selected disabled>--- Til ---</option>
                                    <option value="8:00">8:00</option>
                                    <option value="9:00">9:00</option>
                                    <option value="10:00">10:00</option>
                                    <option value="11:00">11:00</option>
                                    <option value="12:00">12:00</option>
                                    <option value="13:00">13:00</option>
                                    <option value="14:00">14:00</option>
                                    <option value="15:00">15:00</option>
                                    <option value="16:00">16:00</option>
                                    <option value="17:00">17:00</option>
                                    <option value="18:00">18:00</option>
                                    <option value="19:00">19:00</option>
                                    <option value="20:00">20:00</option>
                                </select>
                            </div> <!-- .input end -->
                        </div> <!-- #openinghours end -->

                        <div id="openinghours">
                            <label>Onsdag</label>
                            <div class="input">
                                <select id="wednesdayfromform" class="border-left border-right">
                                    <option value="Fra" selected disabled>--- Fra ---</option>
                                    <option value="Lukket">Lukket</option>
                                    <option value="8:00">8:00</option>
                                    <option value="9:00">9:00</option>
                                    <option value="10:00">10:00</option>
                                    <option value="11:00">11:00</option>
                                    <option value="12:00">12:00</option>
                                    <option value="13:00">13:00</option>
                                    <option value="14:00">14:00</option>
                                    <option value="15:00">15:00</option>
                                    <option value="16:00">16:00</option>
                                    <option value="17:00">17:00</option>
                                    <option value="18:00">18:00</option>
                                    <option value="19:00">19:00</option>
                                    <option value="20:00">20:00</option>
                                </select>
                                <select id="wednesdaytoform" class="border-left border-right">
                                    <option value="Til" selected disabled>--- Til ---</option>
                                    <option value="8:00">8:00</option>
                                    <option value="9:00">9:00</option>
                                    <option value="10:00">10:00</option>
                                    <option value="11:00">11:00</option>
                                    <option value="12:00">12:00</option>
                                    <option value="13:00">13:00</option>
                                    <option value="14:00">14:00</option>
                                    <option value="15:00">15:00</option>
                                    <option value="16:00">16:00</option>
                                    <option value="17:00">17:00</option>
                                    <option value="18:00">18:00</option>
                                    <option value="19:00">19:00</option>
                                    <option value="20:00">20:00</option>
                                </select>
                            </div> <!-- .input end -->
                        </div> <!-- #openinghours end -->

                        <div id="openinghours">
                            <label>Torsdag</label>
                            <div class="input">
                                <select id="thursdayfromform" class="border-left border-right">
                                    <option value="Fra" selected disabled>--- Fra ---</option>
                                    <option value="Lukket">Lukket</option>
                                    <option value="8:00">8:00</option>
                                    <option value="9:00">9:00</option>
                                    <option value="10:00">10:00</option>
                                    <option value="11:00">11:00</option>
                                    <option value="12:00">12:00</option>
                                    <option value="13:00">13:00</option>
                                    <option value="14:00">14:00</option>
                                    <option value="15:00">15:00</option>
                                    <option value="16:00">16:00</option>
                                    <option value="17:00">17:00</option>
                                    <option value="18:00">18:00</option>
                                    <option value="19:00">19:00</option>
                                    <option value="20:00">20:00</option>
                                </select>
                                <select id="thursdaytoform" class="border-left border-right">
                                    <option value="Til" selected disabled>--- Til ---</option>
                                    <option value="Lukket">Lukket</option>
                                    <option value="8:00">8:00</option>
                                    <option value="9:00">9:00</option>
                                    <option value="10:00">10:00</option>
                                    <option value="11:00">11:00</option>
                                    <option value="12:00">12:00</option>
                                    <option value="13:00">13:00</option>
                                    <option value="14:00">14:00</option>
                                    <option value="15:00">15:00</option>
                                    <option value="16:00">16:00</option>
                                    <option value="17:00">17:00</option>
                                    <option value="18:00">18:00</option>
                                    <option value="19:00">19:00</option>
                                    <option value="20:00">20:00</option>
                                </select>
                            </div> <!-- .input end -->
                        </div> <!-- #openinghours end -->

                        <div id="openinghours">
                            <label>Fredag</label>
                            <div class="input">
                                <select id="fridayfromform" class="border-left border-right">
                                    <option value="Fra" selected disabled>--- Fra ---</option>
                                    <option value="Lukket">Lukket</option>
                                    <option value="8:00">8:00</option>
                                    <option value="9:00">9:00</option>
                                    <option value="10:00">10:00</option>
                                    <option value="11:00">11:00</option>
                                    <option value="12:00">12:00</option>
                                    <option value="13:00">13:00</option>
                                    <option value="14:00">14:00</option>
                                    <option value="15:00">15:00</option>
                                    <option value="16:00">16:00</option>
                                    <option value="17:00">17:00</option>
                                    <option value="18:00">18:00</option>
                                    <option value="19:00">19:00</option>
                                    <option value="20:00">20:00</option>
                                </select>
                                <select id="fridaytoform" class="border-left border-right">
                                    <option value="Til" selected disabled>--- Til ---</option>
                                    <option value="8:00">8:00</option>
                                    <option value="9:00">9:00</option>
                                    <option value="10:00">10:00</option>
                                    <option value="11:00">11:00</option>
                                    <option value="12:00">12:00</option>
                                    <option value="13:00">13:00</option>
                                    <option value="14:00">14:00</option>
                                    <option value="15:00">15:00</option>
                                    <option value="16:00">16:00</option>
                                    <option value="17:00">17:00</option>
                                    <option value="18:00">18:00</option>
                                    <option value="19:00">19:00</option>
                                    <option value="20:00">20:00</option>
                                </select>
                            </div> <!-- .input end -->
                        </div> <!-- #openinghours end -->

                        <div id="openinghours">
                            <label>Lørdag</label>
                            <div class="input">
                                <select id="saturdayfromform" class="border-left border-right">
                                    <option value="Fra" selected disabled>--- Fra ---</option>
                                    <option value="Lukket">Lukket</option>
                                    <option value="8:00">8:00</option>
                                    <option value="9:00">9:00</option>
                                    <option value="10:00">10:00</option>
                                    <option value="11:00">11:00</option>
                                    <option value="12:00">12:00</option>
                                    <option value="13:00">13:00</option>
                                    <option value="14:00">14:00</option>
                                    <option value="15:00">15:00</option>
                                    <option value="16:00">16:00</option>
                                    <option value="17:00">17:00</option>
                                    <option value="18:00">18:00</option>
                                    <option value="19:00">19:00</option>
                                    <option value="20:00">20:00</option>
                                </select>
                                <select id="saturdaytoform" class="border-left border-right">
                                    <option value="Til" selected disabled>--- Til ---</option>
                                    <option value="8:00">8:00</option>
                                    <option value="9:00">9:00</option>
                                    <option value="10:00">10:00</option>
                                    <option value="11:00">11:00</option>
                                    <option value="12:00">12:00</option>
                                    <option value="13:00">13:00</option>
                                    <option value="14:00">14:00</option>
                                    <option value="15:00">15:00</option>
                                    <option value="16:00">16:00</option>
                                    <option value="17:00">17:00</option>
                                    <option value="18:00">18:00</option>
                                    <option value="19:00">19:00</option>
                                    <option value="20:00">20:00</option>
                                </select>
                            </div> <!-- .input end -->
                        </div> <!-- #openinghours end -->

                        <div id="openinghours">
                            <label>Søndag</label>
                            <div class="input">
                                <select id="sundayfromform" class="border-left border-right">
                                    <option value="Fra" selected disabled>--- Fra ---</option>
                                    <option value="Lukket">Lukket</option>
                                    <option value="8:00">8:00</option>
                                    <option value="9:00">9:00</option>
                                    <option value="10:00">10:00</option>
                                    <option value="11:00">11:00</option>
                                    <option value="12:00">12:00</option>
                                    <option value="13:00">13:00</option>
                                    <option value="14:00">14:00</option>
                                    <option value="15:00">15:00</option>
                                    <option value="16:00">16:00</option>
                                    <option value="17:00">17:00</option>
                                    <option value="18:00">18:00</option>
                                    <option value="19:00">19:00</option>
                                    <option value="20:00">20:00</option>
                                </select>
                                <select id="sundaytoform" class="border-left border-right">
                                    <option value="Til" selected disabled>--- Til ---</option>
                                    <option value="8:00">8:00</option>
                                    <option value="9:00">9:00</option>
                                    <option value="10:00">10:00</option>
                                    <option value="11:00">11:00</option>
                                    <option value="12:00">12:00</option>
                                    <option value="13:00">13:00</option>
                                    <option value="14:00">14:00</option>
                                    <option value="15:00">15:00</option>
                                    <option value="16:00">16:00</option>
                                    <option value="17:00">17:00</option>
                                    <option value="18:00">18:00</option>
                                    <option value="19:00">19:00</option>
                                    <option value="20:00">20:00</option>
                                </select>
                            </div> <!-- .input end -->
                        </div> <!-- #openinghours end -->
                        
                    </form>

                    <div class="button">
                        <button id="create-openinghours">Tilføj Åbningstider</button>
                    </div>

                </div> <!-- .new_openinghours end -->
            </div> <!-- #new_openinghours end -->
        </div> <!-- .o end -->
    </div> <!-- .buttons end -->
    </div>
</div> <!-- .form end -->