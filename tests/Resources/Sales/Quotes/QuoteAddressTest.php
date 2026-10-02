<?php

use Bexio\Resources\Projects\Projects\Project;
use Bexio\Resources\Sales\Quotes\Quote;

it('creates and updates manual quote addresses on a disposable project', function () {
    withTestProject(function (Project $project): void {
        $quote = (new Quote(
            contact_id: $project->contact_id, pr_project_id: $project->id,
            contact_address_manual: "API sync recipient\nTeststrasse 1",
            delivery_address_manual: "API sync warehouse\nTeststrasse 2", delivery_address_type: 1,
        ))->attachClient(testClient())->create();
        try {
            expect($quote->contact_address)->toContain('API sync recipient')
                ->and($quote->delivery_address)->toContain('API sync warehouse')
                ->and($quote->project_id)->toBe($project->id);
            $quote->contact_address_manual = "Updated recipient\nTeststrasse 3";
            $quote->delivery_address_manual = "Updated warehouse\nTeststrasse 4";
            $quote = $quote->update();
            expect($quote->contact_address)->toContain('Updated recipient')
                ->and($quote->delivery_address)->toContain('Updated warehouse');
        } finally {
            $quote->delete();
        }
    });
});
