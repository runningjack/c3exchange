
@extends("layouts.template")
@section("reserve")
<div class="featured-box featured-box-quaternary" style="height: auto;">
    <div class="box-content" style="padding:15px 0 0 6px;">

        <h4>Our E-currencies Reserve</h4>
        <ul class="no-bullet" style="padding:20px 15px">
            @foreach($reserves as $reserve)
            {{"<li style='text-align: left'>
                <div class='post-info'><a href='#'><img src='img/$reserve->img_url' alt='$reserve->ecurrency'></a>
                    <div class='post-meta' style='float:right'> $ $reserve->reserve_amount</div>
                </div>
            </li>"}}
            @endforeach
        </ul>
    </div>
</div>
@stop
@section("content")
    <div class="large-12 columns pghead"><h2 class="color_gold">Terms and Conditions</h2></div>
    <div class="large-12 columns color-blue" >
        <h4>
            <span class="color-blue">      1. Terms</span>
        </h4>
        <p >
            By accessing this web site, you are agreeing to be bound by these
            web site Terms and Conditions of Use, all applicable laws and regulations,
            and agree that you are responsible for compliance with any applicable local
            laws. If you do not agree with any of these terms, you are prohibited from
            using or accessing this site. The materials contained in this web site are
            protected by applicable copyright and trade mark law.
        </p>

        <h4>
            <span class="color-blue">         2. Use License</span>
        </h4>

        <ol type="a">
            <li>
                Permission is granted to temporarily download one copy of the materials
                (information or software) on c3 global exchange's web site for personal,
                non-commercial transitory viewing only. This is the grant of a license,
                not a transfer of title, and under this license you may not:

                <ol type="i">
                    <li>modify or copy the materials;</li>
                    <li>use the materials for any commercial purpose, or for any public display (commercial or non-commercial);</li>
                    <li>attempt to decompile or reverse engineer any software contained on c3 global exchange's web site;</li>
                    <li>remove any copyright or other proprietary notations from the materials; or</li>
                    <li>transfer the materials to another person or "mirror" the materials on any other server.</li>
                </ol>
            </li>
            <li>
                This license shall automatically terminate if you violate any of these restrictions and may be terminated by c3 global exchange at any time. Upon terminating your viewing of these materials or upon the termination of this license, you must destroy any downloaded materials in your possession whether in electronic or printed format.
            </li>
        </ol>

        <h4>
            <span class="color-blue">       3. Disclaimer</span>
        </h4>

        <ol type="a">
            <li>
                The materials on c3 global exchange's web site are provided "as is". C3 global exchange's makes no warranties, expressed or implied, and hereby disclaims and negates all other warranties, including without limitation, implied warranties or conditions of merchantability, fitness for a particular purpose, or non-infringement of intellectual property or other violation of rights. Further, c3 global exchange does not warrant or make any representations concerning the accuracy, likely results, or reliability of the use of the materials on its Internet web site or otherwise relating to such materials or on any sites linked to this site.
            </li>
        </ol>

        <h4>
            <span class="color-blue">         4. Limitations</span>
        </h4>

        <p class='color-blue'>
            In no event shall c3 global exchange or its suppliers be liable for any damages (including, without limitation, damages for loss of data or profit, or due to business interruption,) arising out of the use or inability to use the materials on c3 global exchange's Internet site, even if c3 global exchange or a c3 global exchange authorized representative has been notified orally or in writing of the possibility of such damage. Because some jurisdictions do not allow limitations on implied warranties, or limitations of liability for consequential or incidental damages, these limitations may not apply to you.
        </p>

        <h4>
            <span class="color-blue">         5. Revisions and Errata</span>
        </h4>

        <p class='color-blue'>
            The materials appearing on c3 global exchange's web site could include technical, typographical, or photographic errors. c3 global exchange does not warrant that any of the materials on its web site are accurate, complete, or current. c3 global exchange may make changes to the materials contained on its web site at any time without notice. c3 global exchange does not, however, make any commitment to update the materials.
        </p>

        <h4><span class="color-blue">
            6. Links</span>
        </h4>

        <p class='color-blue'>
            c3 global exchange has not reviewed all of the sites linked to its Internet web site and is not responsible for the contents of any such linked site. The inclusion of any link does not imply endorsement by c3 global exchange of the site. Use of any such linked web site is at the user's own risk.
        </p>

        <h4>
            <span class="color-blue">      7. Site Terms of Use Modifications </span>
        </h4>

        <p class='color-blue'>
            c3 global exchange may revise these terms of use for its web site at any time without notice. By using this web site you are agreeing to be bound by the then current version of these Terms and Conditions of Use.
        </p>

        <h4>
            <span class="color-blue">      8. Governing Law </span>
        </h4>

        <p class='color-blue'>
            Any claim relating to c3 global exchange's web site shall be governed by the laws of the State of Nigeria without regard to its conflict of law provisions.
        </p>

        <p class='color-blue'>
            General Terms and Conditions applicable to Use of a Web Site.
        </p>

        <h4>
            <span class="color-blue">      9. Privacy Policy </span>
        </h4>

        <p class='color-blue'>
            Your privacy is very important to us. Accordingly, we have developed this Policy in order for you to understand how we collect, use, communicate and disclose and make use of personal information. The following outlines our privacy policy.
        </p>

        <ul>
            <li>
                Before or at the time of collecting personal information, we will identify the purposes for which information is being collected.
            </li>
            <li>
                We will collect and use of personal information solely with the objective of fulfilling those purposes specified by us and for other compatible purposes, unless we obtain the consent of the individual concerned or as required by law.
            </li>
            <li>
                We will only retain personal information as long as necessary for the fulfillment of those purposes.
            </li>
            <li>
                We will collect personal information by lawful and fair means and, where appropriate, with the knowledge or consent of the individual concerned.
            </li>
            <li>
                Personal data should be relevant to the purposes for which it is to be used, and, to the extent necessary for those purposes, should be accurate, complete, and up-to-date.
            </li>
            <li>
                We will protect personal information by reasonable security safeguards against loss or theft, as well as unauthorized access, disclosure, copying, use or modification.
            </li>
            <li>
                We will make readily available to customers information about our policies and practices relating to the management of personal information.
            </li>

            <li>
                We are committed to conducting our business in accordance with these principles in order to ensure that the confidentiality of personal information is protected and maintained.

            </li>
        </ul>

        <p class='color-blue'>

        </p>

    </div>
@stop