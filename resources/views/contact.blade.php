<x-app-layout>
    <x-slot name="header">

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">   
            <div class="wrapper">
                <div class="form-group">
                    <form action="">
                        <div class="contact-top">
                            <div class="form-row">
                                <strong>Naam</strong> 
                                <input class="contact-form-input" id="contact-name" type="text" name="name">
                             </div>
                             <div class="form-row">
                                 <strong>E-Mail</strong> 
                                 <input class="contact-form-input" type="text" name="name">
                              </div>
                        </div>
                        <div class="contact-bottom">
                            <strong>Bericht</strong> 
                            <textarea id="contact-message" name="message" cols="30" rows="10"></textarea>
                        </div>
                        <button type="submit">Verzenden</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>