import SelectFieldType from '../components/Select.vue'
import {ServiceProvider} from '@anomaly/streams-platform'

export class SelectFieldTypeServiceProvider extends ServiceProvider {
    boot(){
        Vue.component('select-field-type', SelectFieldType);
    }
}
