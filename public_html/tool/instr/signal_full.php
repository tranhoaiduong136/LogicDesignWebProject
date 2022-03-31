    <div id="control-explanation" class="mb-4">
        <h5 class="fw-bold">Control signals detail</h5>
        <table class="table table-sm table-responsive table-hover table-bordered text-center align-middle mb-5">
            <caption>ALU Control unit</caption>
            <thead>
                <tr>
                    <th scope="col">ALU Control signals</th>
                    <th scope="col">Functions performed by ALU</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>0000</td>
                    <td>and</td>
                </tr>
                <tr>
                    <td>0001</td>
                    <td>or</td>
                </tr>
                <tr>
                    <td>0010</td>
                    <td>add</td>
                </tr>
                <tr>
                    <td>0110</td>
                    <td>subtract</td>
                </tr>
                <tr>
                    <td>0111</td>
                    <td>set on less than</td>
                </tr>
                <tr>
                    <td>1100</td>
                    <td>NOR</td>
                </tr>
            </tbody>
        </table>
        <table class="table table-sm table-responsive table-hover table-bordered align-middle mb-3">
            <caption>Main Control unit</caption>
            <thead class="text-center">
                <tr>
                    <th scope="col">Main Control signals</th>
                    <th scope="col">Activity</th>
                    <th scope="col">Purpose</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th class="text-center">PCSrc</th>
                    <td class="text-center">PC update</td>
                    <td class="text-left">Indicates whether the PC is replaced by the normal increment value PC &#8592; (PC + 4) or another target address</td>
                </tr>
                <tr>
                    <th class="text-center">Branch</th>
                    <td class="text-center">PC update</td>
                    <td class="text-left">Combined with a condition test boolean to enable loading the branch target address into the PC</td>
                </tr>
                <tr>
                    <th class="text-center">ALUSrc</th>
                    <td class="text-center">Source operand fetch</td>
                    <td class="text-left">Selects the second source operand for the ALU from either register rt or sign-extended immediate field</td>
                </tr>
                <tr>
                    <th class="text-center">ALUOp</th>
                    <td class="text-center">ALU operation</td>
                    <td class="text-left">Either specifies the ALU operation to be performed or specifies that the operation should be determined from the function bits</td>
                </tr>
                <tr>
                    <th class="text-center">MemRead</th>
                    <td class="text-center">Memory access</td>
                    <td class="text-left">Enables a memory read for load instructions</td>
                </tr>
                <tr>
                    <th class="text-center">MemWrite</th>
                    <td class="text-center">Memory access</td>
                    <td class="text-left">Enables a memory write for store instructions</td>
                </tr>
                <tr>
                    <th class="text-center">RegDst</th>
                    <td class="text-center">Register write</td>
                    <td class="text-left">Determines how the destination register is specified (rt or rd)</td>
                </tr>
                <tr>
                    <th class="text-center">RegWrite</th>
                    <td class="text-center">Register write</td>
                    <td class="text-left">Enables a write to one of the registers</td>
                </tr>
                <tr>
                    <th class="text-center">MemtoReg</th>
                    <td class="text-center">Register write</td>
                    <td class="text-left">Determines where the value to be written comes from (ALU result or memory)</td>
                </tr>
            </tbody>
        </table>
    </div>