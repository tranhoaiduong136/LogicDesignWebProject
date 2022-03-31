    <img id="idle-datapath" src ='tool/datapath/single-cycle-r.png' class='img-fluid mx-auto d-block mb-5' alt="mips-single-cycle-datapath-r-type"/>
    <p class="d-flex flex-column justify-content-center text-center py-5 my-5">&#12298; MIPS Single-cycle Datapath of instruction &lsquo;add / sub / and / or / nor / slt&rsquo; &#12299;</p>

    <section class="col-lg-12 col-md-12 col-sm-12 col-xs-12 container-fluid mx-auto px-auto py-5 border-top">
        <div class="d-flex flex-column justify-content-center text-left mx-5 px-5">
            <div class="d-block">
                <h4 class="mb-5"><mark>Details</mark></h4>
                <?php
                    $inserted = include('instr/component.php');
                ?>
                <div id="overall-explanation" class="mb-5">
                    <h5 class="fw-bold">Overall datapath explanation</h5>
                    <ul class="list-group list-group-flush px-auto mx-auto">
                        <li class="list-group-item">The datapath is based on Figure 4.17, page 265 in the book
                        <a href="https://ict.iitk.ac.in/wp-content/uploads/CS422-Computer-Architecture-ComputerOrganizationAndDesign5thEdition2014.pdf">
                        Computer Organization and Design – The Hardware / Software Interface (Fifth edition) by David A. Paterson & John L. Hennessy</a>.
                        For these instructions, no extension is needed.
                        </li>
                        <li class="list-group-item">Arrowheads on wires are only to present which component is driving the wires, wires itself are not directional.</li>
                        <li class="list-group-item">Subscripting operators indicate bit selection.</li>
                    </ul>
                </div>
                <div id="instruction-explanation" class="mb-5">
                    <h5 class="fw-bold">Instruction explanation</h5>
                    <ul class="list-group list-group-flush px-auto mx-auto">
                        <li class="list-group-item">
                            <table class="table table-sm table-responsive table-striped table-hover table-bordered text-center align-middle mb-3">
                                <thead class="table-success">
                                    <tr>
                                        <td>Name</td>
                                        <td>Instruction format</td>
                                        <td>Operation</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>add</td>
                                        <td>add &#36;rd, &#36;rs, &#36;rt</td>
                                        <td>R[rd] = R[rs] + R[rt]</td>
                                    </tr>
                                    <tr>
                                        <td>sub</td>
                                        <td>sub &#36;rd, &#36;rs, &#36;rt</td>
                                        <td>R[rd] = R[rs] - R[rt]</td>
                                    </tr>
                                    <tr>
                                        <td>and</td>
                                        <td>and &#36;rd, &#36;rs, &#36;rt</td>
                                        <td>R[rd] = R[rs] & R[rt]</td>
                                    </tr>
                                   <tr>
                                        <td>or</td>
                                        <td>or &#36;rd, &#36;rs, &#36;rt</td>
                                        <td>R[rd] = R[rs] | R[rt]</td>
                                    </tr>
                                   <tr>
                                        <td>nor</td>
                                        <td>nor &#36;rd, &#36;rs, &#36;rt</td>
                                        <td>R[rd] = ~(R[rs] | R[rt])</td>
                                    </tr>
                                   <tr>
                                        <td>slt</td>
                                        <td>slt &#36;rd, &#36;rs, &#36;rt</td>
                                        <td>R[rd] = (R[rs] &lt; R[rt]) ? 1 : 0 </td>
                                    </tr>
                                </tbody>
                            </table>
                        </li>
                        <li class="list-group-item">Coding format: R-type
                            <table class="table table-sm table-responsive table-bordered text-center align-middle">
                                <tbody>
                                    <tr>
                                        <td>[31-26]: opcode</td>
                                        <td>[25-21]: &#36;rs</td>
                                        <td>[20-16]: &#36;rt</td>
                                        <td>[15-11]: &#36;rd</td>
                                        <td>[10-6]: shamt</td>
                                        <td>[5-0]: funct</td>
                                    </tr>
                                </tbody>
                            </table>
                        </li>
                        <li class="list-group-item">Control signals
                            <table class="table table-sm table-responsive table-bordered text-center mt-2">
                                <thead class="table-success">
                                    <tr>
                                        <td rowspan="2" class="align-middle">Instruction</td>
                                        <td colspan="10">Main control</td>
                                        <td rowspan="2" class="align-middle">ALU control</td>
                                    </tr>
                                    <tr>
                                        <td>PCSrc</td>
                                        <td>Branch</td>
                                        <td>ALUSrc</td>
                                        <td>ALUOp1</td>
                                        <td>ALUOp0</td>
                                        <td>MemRead</td>
                                        <td>MemWrite</td>
                                        <td>RegWrite</td>
                                        <td>RegDst</td>
                                        <td>MemtoReg</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>add</td>
                                        <td rowspan="6" class="align-middle">0</td>
                                        <td rowspan="6" class="align-middle">0</td>
                                        <td rowspan="6" class="align-middle">0</td>
                                        <td rowspan="6" class="align-middle">1</td>
                                        <td rowspan="6" class="align-middle">0</td>
                                        <td rowspan="6" class="align-middle">0</td>
                                        <td rowspan="6" class="align-middle">0</td>
                                        <td rowspan="6" class="align-middle">1</td>
                                        <td rowspan="6" class="align-middle">1</td>
                                        <td rowspan="6" class="align-middle">0</td>
                                        <td>0010</td>
                                    </tr>
                                    <tr>
                                        <td>sub</td>
                                        <td>0110</td>
                                    </tr>
                                    <tr>
                                        <td>and</td>
                                        <td>0000</td>
                                    </tr>
                                    <tr>
                                        <td>or</td>
                                        <td>0001</td>
                                    </tr>
                                    <tr>
                                        <td>nor</td>
                                        <td>1100</td>
                                    </tr>
                                    <tr>
                                        <td>slt</td>
                                        <td>0111</td>
                                    </tr>
                                </tbody>
                            </table>
                        </li>
                        <li class="list-group-item"> Execution flow <br> &#129170;
                            <small class="fst-italic fw-light">Note that this is for reference purpose and these steps are not necessarily happening in this exact order.</small>
                            <ol class="list-group list-group-numbered">
                                <li class="list-group-item border-0">Fetch instruction and increment PC.</li>
                                <li class="list-group-item border-0">Obtain operands from register file, based on source register numbers.</li>
                                <li class="list-group-item border-0">Perform necessary ALU operation.</li>
                                <li class="list-group-item border-0">Select output from ALU to be written to destination register.</li>
                                <li class="list-group-item border-0">Write back to destination register.</li>
                            </ol>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>



