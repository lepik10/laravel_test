<template>
    <p class="fs-5"><b>Текущий баланс: </b> {{ balanceActive }} руб</p>
    <div class="table-wrap mt-5">
        <p class="fs-5"><b>Таблица последних операций</b></p>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Сумма операции</th>
                <th>Описание операции</th>
                <th>Дата</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="operation in operationsActive">
                <td>{{ operation.amount_formatted }} руб</td>
                <td>{{ operation.description }}</td>
                <td>{{ operation.created_at_formatted }}</td>
            </tr>
            <tr v-if="isEmpty">
                <td colspan="3">Операции не найдены!</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        mounted: function () {
            this.timer = setInterval(() => {
                this.checkUpdates()
            }, 5000)
        },
        props: ['balance', 'operations', 'csrf'],
        data: function () {
            return {
                balanceActive: this.balance,
                operationsActive: this.operations
            }
        },
        computed: {
            isEmpty: function() {
                return this.operationsActive.length == 0;
            }
        },
        methods: {
            checkUpdates: function() {
                //console.log(this.csrf);
                fetch('/cabinet/update-info', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': this.csrf
                    }
                })
                .then(response => response.json())
                .then(data => {
                    this.balanceActive = data.balance;
                    this.operationsActive = data.operations;
                });
            }
        }
    }
</script>

