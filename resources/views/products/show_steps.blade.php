@php
use App\Models\Step;
use App\Models\StepGroup;

$strStepId = '';
if ($product->step_type == 0) {
    $step_group = $product->step_group;
    $stepGroup = StepGroup::find($step_group);
    if ($stepGroup) {
        $strStepId = $stepGroup->steps;
    }
} else {
    $strStepId = $product->steps;
}
$arrStepIds = explode(',', $strStepId);
$arrSteps = Step::whereIn('id', $arrStepIds)->get();
@endphp

@if (count($arrSteps))
<div class="card">
    <div class="fs-18 py-2 fw-600 card-header">Steps</div>
    <div class="card-body">
        @foreach ($arrSteps as $step)
            <div class="step-item my-2">
                <h5>
                    {{ $step->name }}
                </h5>
                <div>
                    {{ $step->description }}
                </div>
            </div>
        @endforeach

    </div>
</div>
@endif