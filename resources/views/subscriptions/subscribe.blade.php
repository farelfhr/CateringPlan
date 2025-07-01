@extends('layouts.app')

@section('content')
<div class="container mx-auto py-12 px-4" x-data="{
    selectedPlan: {{ old('plan', request('plan', $mealPlans->first()->id ?? 1)) }},
    selectedMealTypes: [],
    selectedDeliveryDays: [],
    startDate: '{{ old('start_date', now()->addDays(7)->format('Y-m-d')) }}',
    address: '{{ old('address', '') }}',
    phone: '{{ old('phone', '') }}',
    mealPlans: {{ $mealPlans->toJson() }},
    get selectedPlanData() {
        return this.mealPlans.find(plan => plan.id == this.selectedPlan);
    },
    get basePrice() {
        return this.selectedPlanData ? this.selectedPlanData.price : 0;
    },
    get mealTypeMultiplier() {
        return this.selectedMealTypes.length > 0 ? this.selectedMealTypes.length : 1;
    },
    get deliveryDayMultiplier() {
        return this.selectedDeliveryDays.length > 0 ? this.selectedDeliveryDays.length : 1;
    },
    get totalPrice() {
        return this.basePrice * this.mealTypeMultiplier * this.deliveryDayMultiplier * 4.3;
    },
    get formattedTotalPrice() {
        return new Intl.NumberFormat('id-ID').format(this.totalPrice);
    },
    toggleMealType(type) {
        const index = this.selectedMealTypes.indexOf(type);
        if (index > -1) {
            this.selectedMealTypes.splice(index, 1);
        } else {
            this.selectedMealTypes.push(type);
        }
    },
    toggleDeliveryDay(day) {
        const index = this.selectedDeliveryDays.indexOf(day);
        if (index > -1) {
            this.selectedDeliveryDays.splice(index, 1);
        } else {
            this.selectedDeliveryDays.push(day);
        }
    }
}">
    <div class="max-w-4xl mx-auto">
        <div class="text-center mb-12">
            <h1 class="text-4xl md:text-5xl font-heading text-brown mb-4">Buat Langganan Baru</h1>
            <p class="text-lg text-brown max-w-2xl mx-auto">
                Pilih meal plan favorit Anda dan kustomisasi sesuai kebutuhan
            </p>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <div>
                <x-card>
                    <h2 class="text-2xl font-heading text-brown mb-6 text-center">Detail Langganan</h2>
                    <form method="POST" action="{{ route('subscription.store') }}" class="space-y-6" @submit.prevent="
                        $refs.plan.value = selectedPlan;
                        $refs.mealTypes.value = JSON.stringify(selectedMealTypes);
                        $refs.deliveryDays.value = JSON.stringify(selectedDeliveryDays);
                        $el.submit();
                    ">
                        @csrf
                        <input type="hidden" name="plan" x-ref="plan">
                        <input type="hidden" name="meal_types" x-ref="mealTypes">
                        <input type="hidden" name="delivery_days" x-ref="deliveryDays">
                        <div>
                            <x-label>Pilih Meal Plan</x-label>
                            <div class="grid grid-cols-1 gap-4 mt-3">
                                <template x-for="plan in mealPlans" :key="plan.id">
                                    <label class="relative cursor-pointer">
                                        <input type="radio" name="plan" :value="plan.id" x-model="selectedPlan" class="sr-only">
                                        <div class="border-2 rounded-2xl p-4 transition-all duration-300" :class="selectedPlan == plan.id ? 'border-pink-400 bg-pink-50' : 'border-gray-200 hover:border-pink-200'">
                                            <div class="flex items-center justify-between">
                                                <div>
                                                    <h3 class="font-heading text-lg text-brown" x-text="plan.name"></h3>
                                                    <p class="text-brown text-sm" x-text="plan.description"></p>
                                                </div>
                                                <div class="text-right">
                                                    <div class="text-xl font-bold text-pink-400" x-text="'Rp' + new Intl.NumberFormat('id-ID').format(plan.price)"></div>
                                                    <div class="text-brown text-sm">per minggu</div>
                                                </div>
                                            </div>
                                        </div>
                                    </label>
                                </template>
                            </div>
                        </div>
                        <div>
                            <x-label>Tipe Makanan</x-label>
                            <p class="text-sm text-brown mb-3">Pilih tipe makanan yang ingin Anda terima</p>
                            <div class="grid grid-cols-2 gap-3">
                                <template x-for="type in ['Sarapan', 'Makan Siang', 'Makan Malam', 'Snack']" :key="type">
                                    <label class="relative cursor-pointer">
                                        <input type="checkbox" name="meal_types[]" :value="type" x-model="selectedMealTypes" class="sr-only">
                                        <div class="border-2 rounded-xl p-3 text-center transition-all duration-200 flex items-center justify-center relative"
                                            :class="selectedMealTypes.includes(type)
                                                ? 'border-pink-400 bg-pink-100 ring-2 ring-pink-300 scale-105 shadow-lg'
                                                : 'border-gray-200 hover:border-pink-200 bg-white'">
                                            <span class="text-brown font-medium" x-text="type"></span>
                                            <template x-if="selectedMealTypes.includes(type)">
                                                <svg class="w-5 h-5 text-pink-500 absolute top-2 right-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                                                </svg>
                                            </template>
                                        </div>
                                    </label>
                                </template>
                            </div>
                        </div>
                        <div>
                            <x-label>Hari Pengiriman</x-label>
                            <p class="text-sm text-brown mb-3">Pilih hari-hari pengiriman yang diinginkan</p>
                            <div class="grid grid-cols-2 gap-3">
                                <template x-for="day in ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu']" :key="day">
                                    <label class="relative cursor-pointer">
                                        <input type="checkbox" name="delivery_days[]" :value="day" x-model="selectedDeliveryDays" class="sr-only">
                                        <div class="border-2 rounded-xl p-3 text-center transition-all duration-200 flex items-center justify-center relative"
                                            :class="selectedDeliveryDays.includes(day)
                                                ? 'border-blue-400 bg-blue-100 ring-2 ring-blue-300 scale-105 shadow-lg'
                                                : 'border-gray-200 hover:border-blue-200 bg-white'">
                                            <span class="text-brown font-medium" x-text="day"></span>
                                            <template x-if="selectedDeliveryDays.includes(day)">
                                                <svg class="w-5 h-5 text-blue-500 absolute top-2 right-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                                                </svg>
                                            </template>
                                        </div>
                                    </label>
                                </template>
                            </div>
                        </div>
                        <div>
                            <x-label for="start_date">Tanggal Mulai</x-label>
                            <x-input type="date" name="start_date" x-model="startDate" x-bind:min="new Date().toISOString().split('T')[0]" required />
                        </div>
                        <div>
                            <x-label for="address">Alamat Pengiriman</x-label>
                            <textarea name="address" x-model="address" class="w-full bg-white/80 border-2 border-primary/30 rounded-2xl px-4 py-3 focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all resize-none" rows="3" placeholder="Masukkan alamat lengkap pengiriman..." required></textarea>
                        </div>
                        <div>
                            <x-label for="phone">No. HP</x-label>
                            <x-input name="phone" x-model="phone" placeholder="08123456789" required />
                        </div>
                        <div>
                            <x-label for="allergies">Alergi (Opsional)</x-label>
                            <textarea name="allergies" class="w-full bg-white/80 border-2 border-primary/30 rounded-2xl px-4 py-3 focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all resize-none" rows="3" placeholder="Sebutkan alergi makanan yang Anda miliki (jika ada)..."></textarea>
                        </div>
                        <x-button type="submit" variant="primary" class="w-full text-lg py-4">Buat Langganan</x-button>
                    </form>
                </x-card>
            </div>
            <div>
                <x-card class="h-fit sticky top-8">
                    <h2 class="text-2xl font-heading text-brown mb-6 text-center">Ringkasan Langganan</h2>
                    <div class="mb-6">
                        <h3 class="font-heading text-lg text-brown mb-3">Meal Plan Terpilih</h3>
                        <div class="bg-gradient-to-r from-pink-50 to-blue-50 rounded-2xl p-4">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h4 class="font-heading text-lg text-brown" x-text="selectedPlanData ? selectedPlanData.name : 'Pilih Meal Plan'"></h4>
                                    <p class="text-brown text-sm" x-text="selectedPlanData ? selectedPlanData.description : ''"></p>
                                </div>
                                <div class="text-right">
                                    <div class="text-xl font-bold text-pink-400" x-text="selectedPlanData ? 'Rp' + new Intl.NumberFormat('id-ID').format(selectedPlanData.price) : 'Rp0'"></div>
                                    <div class="text-brown text-sm">per minggu</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-6" x-show="selectedMealTypes.length > 0">
                        <h3 class="font-heading text-lg text-brown mb-3">Tipe Makanan</h3>
                        <div class="space-y-2">
                            <template x-for="type in selectedMealTypes" :key="type">
                                <div class="flex items-center space-x-3 bg-pink-50 rounded-xl p-3">
                                    <div class="w-8 h-8 bg-pink-100 rounded-full flex items-center justify-center">
                                        <svg class="w-4 h-4 text-pink-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </div>
                                    <span class="text-brown font-medium" x-text="type"></span>
                                </div>
                            </template>
                        </div>
                    </div>
                    <div class="mb-6" x-show="selectedDeliveryDays.length > 0">
                        <h3 class="font-heading text-lg text-brown mb-3">Hari Pengiriman</h3>
                        <div class="flex flex-wrap gap-2">
                            <template x-for="day in selectedDeliveryDays" :key="day">
                                <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm font-medium" x-text="day"></span>
                            </template>
                        </div>
                    </div>
                    <div class="mb-6">
                        <h3 class="font-heading text-lg text-brown mb-3">Rincian Harga</h3>
                        <div class="space-y-2 text-brown">
                            <div class="flex justify-between">
                                <span>Harga dasar per minggu:</span>
                                <span x-text="'Rp' + new Intl.NumberFormat('id-ID').format(basePrice)"></span>
                            </div>
                            <div class="flex justify-between">
                                <span>Jumlah tipe makanan:</span>
                                <span x-text="mealTypeMultiplier + 'x'"></span>
                            </div>
                            <div class="flex justify-between">
                                <span>Jumlah hari pengiriman:</span>
                                <span x-text="deliveryDayMultiplier + 'x'"></span>
                            </div>
                            <div class="flex justify-between">
                                <span>Durasi (4.3 minggu/bulan):</span>
                                <span>4.3x</span>
                            </div>
                            <div class="border-t pt-2 mt-4">
                                <div class="flex justify-between font-bold text-lg">
                                    <span>Total per bulan:</span>
                                    <span class="text-pink-400" x-text="'Rp' + formattedTotalPrice"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gradient-to-r from-green-50 to-blue-50 rounded-2xl p-4">
                        <h3 class="font-heading text-lg text-brown mb-3">Fitur Langganan</h3>
                        <div class="space-y-2">
                            <div class="flex items-center space-x-3">
                                <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span class="text-brown text-sm">Pengiriman gratis</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span class="text-brown text-sm">Bisa pause/cancel kapan saja</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span class="text-brown text-sm">Kemasan ramah lingkungan</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span class="text-brown text-sm">Informasi nutrisi lengkap</span>
                            </div>
                        </div>
                    </div>
                </x-card>
            </div>
        </div>
    </div>
</div>
@endsection
