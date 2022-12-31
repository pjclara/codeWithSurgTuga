<template>
    <div>
        <div class="v-input v-input--horizontal v-input--density-default v-input--dirty v-text-field"><!---->
            <div class="v-input__control">
                <div class="v-field v-field--active v-field--dirty v-field--variant-filled v-theme--light"
                    role="textbox">
                    <div class="v-field__overlay"></div>

                    <div class="v-field__field" data-no-activator=""><label
                            class="v-label v-field-label v-field-label--floating" aria-hidden="true"
                            for="input-29"><!---->{{ labelValue }}</label><label class="v-label v-field-label"
                            for="input-29"><!---->{{ labelValue }}</label><!----><input size="1" type="date"
                            id="input-29" :value="modelValue" @input="$emit('update:modelValue', $event.target.value)" class="v-field__input"><!----></div><!----><!---->
                    <div class="v-field__outline"><!----><!----></div>
                </div>
            </div><!---->
            <div class="v-input__details">
                <div class="v-messages"></div><!---->
            </div>
        </div>
    </div>
</template>

<script setup>

let props = defineProps(['labelValue', 'modelValue'])



</script>