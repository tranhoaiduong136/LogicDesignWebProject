    <img id="idle-datapath" src ='tool/datapath/single-cycle-bne.png' class='img-fluid mx-auto d-block mb-5' alt="mips-single-cycle-datapath-i-type-branch-on-not-equal"/>
    <p class="d-flex flex-column justify-content-center text-center py-5 my-5">&#12298; MIPS Single-cycle Datapath of instruction &lsquo;bne&rsquo; &#12299;</p>

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
                        For this instruction, extension is needed, <a href="#ext-explanation" class="text-decoration-none text-success">see details below</a>.
                        </li>
                        <li class="list-group-item">Arrowheads on wires are only to present which component is driving the wires, wires itself are not directional.</li>
                        <li class="list-group-item">Subscripting operators indicate bit selection.</li>
                    </ul>
                </div>
                <div id="instruction-explanation" class="mb-5">
                    <h5 class="fw-bold">Instruction explanation</h5>
                    <ul class="list-group list-group-flush px-auto mx-auto">
                        <li class="list-group-item">Instruction name: Branch-on-Not-Equal / bne &#36;rs, &#36;rt, BranchAddr
                        </li>
                        <li class="list-group-item">Operation: if (R[rs]!=R[rt]) then PC=PC+4+BranchAddr <br>
                        <small class="fw-lighter">Note: Why it is PC+4+BranchAddr but not BranchAddr solely? See
                        <a href="https://en.wikipedia.org/wiki/Delay_slot" class="text-decoration-none text-success">branch delay slot</a> for more information.
                        </small>
                        </li>
                        <li class="list-group-item">Coding format: I-type
                            <table class="table table-sm table-responsive table-bordered text-center align-middle">
                                <tbody>
                                    <tr>
                                        <td>[31-26]: opcode</td>
                                        <td>[25-21]: &#36;rs</td>
                                        <td>[20-16]: &#36;rt</td>
                                        <td>[15-0]: imm</td>
                                    </tr>
                                </tbody>
                            </table>
                        </li>
                        <li class="list-group-item">Control signals
                            <table class="table table-sm table-responsive table-bordered text-center mt-2">
                                <thead class="table-success">
                                    <tr>
                                        <td colspan="11">Main control</td>
                                        <td rowspan="2" class="align-middle">ALU control</td>
                                    </tr>
                                    <tr>
                                        <td>bne</td>
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
                                        <td>1</td>
                                        <td>if (R[rs]!=R[rt])
                                        PCSrc = 1
                                        else PCSrc = 0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>1</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>X</td>
                                        <td>X</td>
                                        <td>0110</td>
                                    </tr>
                                </tbody>
                            </table>
                        </li>
                        <li class="list-group-item"> Execution flow <br> &#129170;
                            <small class="fst-italic fw-light">Note that this is for reference purpose and these steps are not necessarily happening in this exact order.</small>
                            <ol class="list-group list-group-numbered">
                                <li class="list-group-item border-0">Fetch instruction and increment PC.</li>
                                <li class="list-group-item border-0">Read data values from two registers specified in the instruction.</li>
                                <li class="list-group-item border-0">Perform subtraction of the two values using ALU.</li>
                                <li class="list-group-item border-0">Generate target address for branching.</li>
                                <li class="list-group-item border-0">Analyze Zero output from ALU and control signal &lsquo;Branch&rsquo;
                                                                     to determine whether the branch is taken or not.
                                <small class="mx-auto">
                                    <div>if (Zero == 0 && bne == 1)</div>
                                    <div class="mx-4">PC=PC+4+BranchAddr</div>
                                    <div>else PC=PC+4</div>
                                </small>
                                </li>
                            </ol>
                        </li>
                    </ul>
                </div>
                <div id="ext-explanation" class="mb-5">
                    <h5 class="fw-bold">Extension explanation</h5>
                    <ul class="list-group list-group-flush px-auto mx-auto">
                        <li class="list-group-item">This instruction is quite similar to the Branch-on-Equal beq instruction, it still uses
                        the &lsquo;Zero&rsquo; output from ALU to determine the equality of &#36;rs and &#36;rt. The difference is that in the beq case, the branch
                        is taken if they are equal, whereas for bne, the branch is taken only when &#36;rs and &#36;rt are not equal. So, to
                        add bne to the set and still guarantee the normal, separate execution of beq, these components should be added:
                            <ul>
                                <li>1 control line &lsquo;bne&rsquo;</li>
                                <li>1 AND gate, whose inputs are the &lsquo;bne&rsquo; signal and the inverted &lsquo;Zero&rsquo; output from ALU.
                                <small class="fw-lighter">&#8627; if (bne == 1 && Zero == 0) then output = 1</small>
                                </li>
                                <li>1 OR gate that receives inputs from two OR gates of beq and bne, the output of this will be the &lsquo;PCSrc&rsquo; signal
                                to be supplied to the MUX to determine whether the branch is taken or not.<br>
                                <small class="fw-lighter">&#8627; if ((bne == 1 && Zero == 0) || (Branch == 1 && Zero == 1)) then output = 1</small>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>



