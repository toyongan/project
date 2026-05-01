<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl leading-tight" style="color:#3d3530;">
                {{ __('Edit Job Post') }}
            </h2>
            <a href="{{ route('hr.jobs.index') }}"
               class="text-sm"
               style="color:#7c5c4a;"
               onmouseover="this.style.color='#6b4e3e'"
               onmouseout="this.style.color='#7c5c4a'">
                ← Back
            </a>
        </div>
    </x-slot>

    <div class="py-8" style="background:#f0ede8; min-height:100%;">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="overflow-hidden sm:rounded-lg"
                 style="background:#faf8f5; border:1px solid #e2ddd7;">

                {{-- Card header --}}
                <div class="px-6 py-4 flex items-center gap-3"
                     style="background:#f5f2ee; border-bottom:1px solid #e2ddd7;">
                    <span class="inline-block w-2 h-2 rounded-full" style="background:#6b9e6e;"></span>
                    <span class="text-sm font-medium" style="color:#5a5048; letter-spacing:0.02em;">
                        Job details
                    </span>
                    <span class="ml-auto text-xs font-semibold rounded-full px-3 py-1"
                          style="background:#f0e8e2; color:#7c5c4a; border:1px solid #e0d4cc; letter-spacing:0.05em;">
                        {{ ucfirst($job->status) }}
                    </span>
                </div>

                <div class="p-6">
                    <form method="POST" action="{{ route('hr.jobs.update', $job) }}">
                        @csrf
                        @method('PUT')

                        {{-- Section: Position --}}
                        <p class="mb-4 text-xs font-bold uppercase"
                           style="color:#c4bdb7; letter-spacing:0.12em;">Position</p>

                        {{-- Title --}}
                        <div class="mb-5">
                            <label for="title"
                                   class="block text-xs font-semibold uppercase mb-1.5"
                                   style="color:#a09890; letter-spacing:0.08em;">
                                {{ __('Job Title') }}
                            </label>
                            <input id="title" name="title" type="text"
                                   class="block w-full rounded-lg text-sm"
                                   style="background:#f0ede8; border:1px solid #ddd8d2; color:#3d3530;
                                          padding:9px 12px; outline:none; font-family:inherit;
                                          transition:border-color 0.15s, box-shadow 0.15s;"
                                   value="{{ old('title', $job->title) }}"
                                   onfocus="this.style.borderColor='#b8a89e';this.style.boxShadow='0 0 0 3px rgba(124,92,74,0.08)'"
                                   onblur="this.style.borderColor='#ddd8d2';this.style.boxShadow='none'"
                                   required />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        {{-- Type & Location --}}
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-5">
                            <div>
                                <label for="type"
                                       class="block text-xs font-semibold uppercase mb-1.5"
                                       style="color:#a09890; letter-spacing:0.08em;">
                                    {{ __('Job Type') }}
                                </label>
                                <select id="type" name="type"
                                        class="block w-full rounded-lg text-sm"
                                        style="background:#f0ede8; border:1px solid #ddd8d2; color:#3d3530;
                                               padding:9px 32px 9px 12px; outline:none; font-family:inherit;
                                               appearance:none; -webkit-appearance:none;
                                               background-image:url('data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%2210%22 height=%226%22 viewBox=%220 0 10 6%22%3E%3Cpath d=%22M1 1l4 4 4-4%22 stroke=%22%23a09890%22 stroke-width=%221.5%22 fill=%22none%22 stroke-linecap=%22round%22/%3E%3C/svg%3E');
                                               background-repeat:no-repeat; background-position:right 12px center;
                                               transition:border-color 0.15s, box-shadow 0.15s;"
                                        onfocus="this.style.borderColor='#b8a89e';this.style.boxShadow='0 0 0 3px rgba(124,92,74,0.08)'"
                                        onblur="this.style.borderColor='#ddd8d2';this.style.boxShadow='none'">
                                    <option value="full-time"  {{ old('type', $job->type) == 'full-time'  ? 'selected' : '' }}>Full-time</option>
                                    <option value="part-time"  {{ old('type', $job->type) == 'part-time'  ? 'selected' : '' }}>Part-time</option>
                                    <option value="contract"   {{ old('type', $job->type) == 'contract'   ? 'selected' : '' }}>Contract</option>
                                    <option value="internship" {{ old('type', $job->type) == 'internship' ? 'selected' : '' }}>Internship</option>
                                </select>
                                <x-input-error :messages="$errors->get('type')" class="mt-2" />
                            </div>

                            <div>
                                <label for="location"
                                       class="block text-xs font-semibold uppercase mb-1.5"
                                       style="color:#a09890; letter-spacing:0.08em;">
                                    {{ __('Location') }}
                                </label>
                                <input id="location" name="location" type="text"
                                       class="block w-full rounded-lg text-sm"
                                       style="background:#f0ede8; border:1px solid #ddd8d2; color:#3d3530;
                                              padding:9px 12px; outline:none; font-family:inherit;
                                              transition:border-color 0.15s, box-shadow 0.15s;"
                                       value="{{ old('location', $job->location) }}"
                                       placeholder="e.g. Manila or Remote"
                                       onfocus="this.style.borderColor='#b8a89e';this.style.boxShadow='0 0 0 3px rgba(124,92,74,0.08)'"
                                       onblur="this.style.borderColor='#ddd8d2';this.style.boxShadow='none'"
                                       required />
                                <x-input-error :messages="$errors->get('location')" class="mt-2" />
                            </div>
                        </div>

                        {{-- Salary --}}
                        <div class="mb-5">
                            <label for="salary"
                                   class="block text-xs font-semibold uppercase mb-1.5"
                                   style="color:#a09890; letter-spacing:0.08em;">
                                {{ __('Salary Range') }}
                                <span class="normal-case font-normal"
                                      style="color:#c4bdb7; letter-spacing:0;">(optional)</span>
                            </label>
                            <input id="salary" name="salary" type="text"
                                   class="block w-full rounded-lg text-sm"
                                   style="background:#f0ede8; border:1px solid #ddd8d2; color:#3d3530;
                                          padding:9px 12px; outline:none; font-family:inherit;
                                          transition:border-color 0.15s, box-shadow 0.15s;"
                                   value="{{ old('salary', $job->salary) }}"
                                   placeholder="e.g. ₱20,000 – ₱30,000"
                                   onfocus="this.style.borderColor='#b8a89e';this.style.boxShadow='0 0 0 3px rgba(124,92,74,0.08)'"
                                   onblur="this.style.borderColor='#ddd8d2';this.style.boxShadow='none'" />
                            <p class="mt-1 text-xs" style="color:#b8b0a8;">
                                Leave blank to keep salary confidential.
                            </p>
                            <x-input-error :messages="$errors->get('salary')" class="mt-2" />
                        </div>

                        {{-- Divider --}}
                        <div class="my-5" style="height:1px; background:#e2ddd7;"></div>

                        {{-- Section: Content --}}
                        <p class="mb-4 text-xs font-bold uppercase"
                           style="color:#c4bdb7; letter-spacing:0.12em;">Content</p>

                        {{-- Description --}}
                        <div class="mb-5">
                            <label for="description"
                                   class="block text-xs font-semibold uppercase mb-1.5"
                                   style="color:#a09890; letter-spacing:0.08em;">
                                {{ __('Job Description') }}
                            </label>
                            <textarea id="description" name="description" rows="5"
                                      class="block w-full rounded-lg text-sm"
                                      style="background:#f0ede8; border:1px solid #ddd8d2; color:#3d3530;
                                             padding:9px 12px; outline:none; font-family:inherit;
                                             line-height:1.6; resize:vertical;
                                             transition:border-color 0.15s, box-shadow 0.15s;"
                                      onfocus="this.style.borderColor='#b8a89e';this.style.boxShadow='0 0 0 3px rgba(124,92,74,0.08)'"
                                      onblur="this.style.borderColor='#ddd8d2';this.style.boxShadow='none'"
                                      required>{{ old('description', $job->description) }}</textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        {{-- Requirements --}}
                        <div class="mb-5">
                            <label for="requirements"
                                   class="block text-xs font-semibold uppercase mb-1.5"
                                   style="color:#a09890; letter-spacing:0.08em;">
                                {{ __('Requirements') }}
                                <span class="normal-case font-normal"
                                      style="color:#c4bdb7; letter-spacing:0;">(optional)</span>
                            </label>
                            <textarea id="requirements" name="requirements" rows="4"
                                      class="block w-full rounded-lg text-sm"
                                      style="background:#f0ede8; border:1px solid #ddd8d2; color:#3d3530;
                                             padding:9px 12px; outline:none; font-family:inherit;
                                             line-height:1.6; resize:vertical;
                                             transition:border-color 0.15s, box-shadow 0.15s;"
                                      onfocus="this.style.borderColor='#b8a89e';this.style.boxShadow='0 0 0 3px rgba(124,92,74,0.08)'"
                                      onblur="this.style.borderColor='#ddd8d2';this.style.boxShadow='none'">{{ old('requirements', $job->requirements) }}</textarea>
                            <x-input-error :messages="$errors->get('requirements')" class="mt-2" />
                        </div>

                        {{-- Divider --}}
                        <div class="my-5" style="height:1px; background:#e2ddd7;"></div>

                        {{-- Section: Visibility --}}
                        <p class="mb-4 text-xs font-bold uppercase"
                           style="color:#c4bdb7; letter-spacing:0.12em;">Visibility</p>

                        {{-- Status --}}
                        <div class="mb-6">
                            <label for="status"
                                   class="block text-xs font-semibold uppercase mb-1.5"
                                   style="color:#a09890; letter-spacing:0.08em;">
                                {{ __('Status') }}
                            </label>
                            <select id="status" name="status"
                                    class="block w-full rounded-lg text-sm"
                                    style="background:#f0ede8; border:1px solid #ddd8d2; color:#3d3530;
                                           padding:9px 32px 9px 12px; outline:none; font-family:inherit;
                                           appearance:none; -webkit-appearance:none;
                                           background-image:url('data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%2210%22 height=%226%22 viewBox=%220 0 10 6%22%3E%3Cpath d=%22M1 1l4 4 4-4%22 stroke=%22%23a09890%22 stroke-width=%221.5%22 fill=%22none%22 stroke-linecap=%22round%22/%3E%3C/svg%3E');
                                           background-repeat:no-repeat; background-position:right 12px center;
                                           transition:border-color 0.15s, box-shadow 0.15s;"
                                    onfocus="this.style.borderColor='#b8a89e';this.style.boxShadow='0 0 0 3px rgba(124,92,74,0.08)'"
                                    onblur="this.style.borderColor='#ddd8d2';this.style.boxShadow='none'">
                                <option value="open"   {{ old('status', $job->status) == 'open'   ? 'selected' : '' }}>Open – accepting applications</option>
                                <option value="closed" {{ old('status', $job->status) == 'closed' ? 'selected' : '' }}>Closed – no longer accepting</option>
                            </select>
                            <x-input-error :messages="$errors->get('status')" class="mt-2" />
                        </div>

                        {{-- Actions --}}
                        <div class="flex gap-3 pt-5" style="border-top:1px solid #e2ddd7;">
                            <button type="submit"
                                    class="inline-flex items-center rounded-lg text-xs font-semibold uppercase tracking-widest"
                                    style="background:#7c5c4a; color:#fdf9f7; padding:9px 20px;
                                           border:none; cursor:pointer; letter-spacing:0.05em;
                                           transition:background 0.15s;"
                                    onmouseover="this.style.background='#6b4e3e'"
                                    onmouseout="this.style.background='#7c5c4a'">
                                {{ __('Update Job Post') }}
                            </button>

                            <a href="{{ route('hr.jobs.index') }}"
                               class="inline-flex items-center rounded-lg text-xs font-semibold uppercase tracking-widest"
                               style="background:transparent; color:#5a5048; padding:9px 18px;
                                      border:1px solid #ddd8d2; letter-spacing:0.05em;
                                      transition:background 0.15s;"
                               onmouseover="this.style.background='#f5f2ee'"
                               onmouseout="this.style.background='transparent'">
                                Cancel
                            </a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>